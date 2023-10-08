<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\MusicRequest;
use App\Http\Controllers\Controller;

class MusicController extends Controller
{
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

        return response()->json([
            'message' => 'Music created successfully !',
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $result = DB::select('SELECT * FROM music WHERE id = ?', [$id]);

        if (count($result) === 0) {
            return response()->json(['error' => 'Music not found !'], 406);
        } else {
            $music = (object) $result[0]; // Convert the result to an object
            $genres = ['rnb' => 'RNB', 'country' => 'Country', 'classic' => 'Classic', 'rock' => 'Rock', 'jazz' => 'Jazz'];
        }
        return response()->json([
            'message' => 'success',
            'music' => $music,
            'genres' => $genres,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $music = DB::select('SELECT artist_id FROM music WHERE id = ?', [$id]);

        $music = DB::update(
            'UPDATE music SET artist_id = ?,title = ?,album_name = ?,genre = ?,updated_at = NOW() WHERE id = ?',
            [
                $music[0]->artist_id,
                $data['title'],
                $data['album_name'],
                $data['genre'],
                $id
            ]
        );

        return response()->json([
            'message' => 'Music updated successfully !',
            'music' => $music
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $music = DB::select('SELECT * FROM music WHERE id = ?', [$id]);
        $result = DB::delete('DELETE FROM music WHERE id = ?', [$id]);

        if ($result) {
            return response()->json([
                'message' => 'Music deleted successfully !',
                'music' => $music
            ], 200);
        } else {
            return response()->json(['error' => 'Music not found !'], 406);
        }
    }
}
