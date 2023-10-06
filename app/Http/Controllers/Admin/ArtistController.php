<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Exports\ArtistExport;
use App\Imports\ArtistImport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArtistRequest;
use Maatwebsite\Excel\Facades\Excel;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artists = DB::select('SELECT * FROM artists');
        return view('admin.artists.index', compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.artists.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArtistRequest $request)
    {
        $data = $request->all();

        DB::insert(
            'INSERT INTO artists (name,dob,gender,address,first_release_year,no_of_albums_released,created_at,updated_at) VALUES ( ?, ?, ?, ?, ?, ?,NOW(), NOW())',
            [
                $data['name'],
                $data['dob'],
                $data['gender'],
                $data['address'],
                $data['first_release_year'],
                $data['no_of_albums_released'],
            ]
        );

        return redirect()->route('artist.index')->with('success', 'Artist ' . $data['name'] . ' created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result = DB::select('SELECT * FROM artists WHERE id = ?', [$id]);

        if (count($result) === 0) {
            return redirect()->route('artist.index')->with('error', 'Artist not found!');
        } else {
            $artist = (object) $result[0]; // Convert the result to an object
        }
        return view('admin.artists.show', compact('artist'));
    }

    public function song(string $id)
    {
        $result = DB::select('SELECT * FROM artists WHERE id = ?', [$id]);

        if (count($result) === 0) {
            return redirect()->route('artist.index')->with('error', 'Artist not found!');
        } else {
            $artist = (object) $result[0]; // Convert the result to an object
            $songs = DB::select('SELECT * FROM music WHERE artist_id = ?', [$id]);
        }
        return view('admin.artists.music.index', compact('artist', 'songs'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $result = DB::select('SELECT * FROM artists WHERE id = ?', [$id]);

        if (count($result) === 0) {
            return redirect()->route('artist.index')->with('error', 'Artist not found!');
        } else {
            $artist = (object) $result[0]; // Convert the result to an object
        }
        $genders = ['m' => 'Male', 'f' => 'Female', 'o' => 'Other'];

        return view('admin.artists.edit', compact('artist', 'genders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArtistRequest $request, string $id)
    {
        $data = $request->all();

        DB::update(
            'UPDATE artists SET name = ?,dob = ?,gender = ?,address = ?,first_release_year = ?,no_of_albums_released = ?,updated_at = NOW() WHERE id = ?',
            [
                $data['name'],
                $data['dob'],
                $data['gender'],
                $data['address'],
                $data['first_release_year'],
                $data['no_of_albums_released'],
                $id
            ]
        );

        return redirect()->route('artist.index')->with('success', 'Artist "' . $data['name'] . '" updated successfully!');
    }

    public function fileImport(Request $request)
    {
        Excel::import(new ArtistImport, $request->file('file')->store('temp'));
        return back();
    }

    public function fileExport()
    {
        return Excel::download(new ArtistExport, 'artists-collection.csv');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $artist = DB::select('SELECT * FROM artists WHERE id = ?', [$id]);
        DB::delete('DELETE FROM artists WHERE id = ?', [$id]);
        return redirect()->route('artist.index')->with('success', 'Artist ' . $artist[0]->name . ' deleted successfully!');
    }
}
