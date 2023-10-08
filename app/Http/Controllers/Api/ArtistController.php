<?php

namespace App\Http\Controllers\Api;

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

        return response()->json([
            'message' => 'Artists List !',
            'artists' => $artists
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArtistRequest $request)
    {
        $data = $request->all();

        $artist = DB::insert(
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

        return response()->json([
            'message' => 'Artist created successfully !',
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result = DB::select('SELECT * FROM artists WHERE id = ?', [$id]);

        if (count($result) === 0) {
            return response()->json(['error' => 'Artist not found !'], 406);
        } else {
            $artist = (object) $result[0]; // Convert the result to an object
        }
        return response()->json([
            'message' => 'success',
            'artist' => $artist
        ], 200);
    }

    public function song(string $id)
    {
        $result = DB::select('SELECT * FROM artists WHERE id = ?', [$id]);

        if (count($result) === 0) {
            return response()->json(['error' => 'Artist not found !'], 406);
        } else {
            $artist = (object) $result[0]; // Convert the result to an object
            $songs = DB::select('SELECT * FROM music WHERE artist_id = ?', [$id]);
        }
        return response()->json([
            'message' => 'success',
            'artist' => $artist,
            'songs' => $songs,
        ], 200);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $result = DB::select('SELECT * FROM artists WHERE id = ?', [$id]);

        if (count($result) === 0) {
            return response()->json(['error' => 'Artist not found !'], 406);
        } else {
            $artist = (object) $result[0]; // Convert the result to an object
        }
        $genders = ['m' => 'Male', 'f' => 'Female', 'o' => 'Other'];

        return response()->json([
            'message' => 'success',
            'artist' => $artist,
            'genders' => $genders,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArtistRequest $request, string $id)
    {
        $data = $request->all();

        $artist = DB::update(
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

        return response()->json([
            'message' => 'Artist updated successfully !',
            'artist' => $artist
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $artist = DB::select('SELECT * FROM artists WHERE id = ?', [$id]);
        $result = DB::delete('DELETE FROM artists WHERE id = ?', [$id]);

        if ($result) {
            return response()->json([
                'message' => 'Artist deleted successfully !',
                'artist' => $artist
            ], 200);
        } else {
            return response()->json(['error' => 'Artist not found !'], 406);
        }
    }
}
