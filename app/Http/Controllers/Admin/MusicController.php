<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\MusicRequest;
use App\Http\Controllers\Controller;

class MusicController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create($artistId)
    {
        return view('admin.artists.music.add', compact('artistId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MusicRequest $request)
    {
        $data = $request->all();

        DB::insert(
            'INSERT INTO music (artist_id,title,album_name,genre,created_at,updated_at) VALUES ( ?, ?, ?, ?,NOW(), NOW())',
            [
                $data['artist_id'],
                $data['title'],
                $data['album_name'],
                $data['genre'],
            ]
        );

        return redirect()->to("/admin/artists/{$data['artist_id']}/songs")->with('success', 'Music "' . $data['title'] . '" created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $result = DB::select('SELECT * FROM music WHERE id = ?', [$id]);

        if (count($result) === 0) {
            return redirect()->back()->with('error', 'Music not found!');
        } else {
            $music = (object) $result[0]; // Convert the result to an object
        }
        $genres = ['rnb' => 'RNB', 'country' => 'Country', 'classic' => 'Classic', 'rock' => 'Rock', 'jazz' => 'Jazz'];
        return view('admin.artists.music.edit', compact('music', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $music = DB::select('SELECT artist_id FROM music WHERE id = ?', [$id]);

        DB::update(
            'UPDATE music SET artist_id = ?,title = ?,album_name = ?,genre = ?,updated_at = NOW() WHERE id = ?',
            [
                $music[0]->artist_id,
                $data['title'],
                $data['album_name'],
                $data['genre'],
                $id
            ]
        );

        return redirect()->to("/admin/artists/{$music[0]->artist_id}/songs")->with('success', 'Music "' . $data['title'] . '" updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $music = DB::select('SELECT * FROM music WHERE id = ?', [$id]);
        DB::delete('DELETE FROM music WHERE id = ?', [$id]);
        return redirect()->back()->with('success', 'Music "' . $music[0]->title . '" deleted successfully!');
    }
}
