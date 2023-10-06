<?php

namespace App\Imports;

use App\Models\Artist;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ArtistImport implements ToModel
{
    /**
     * @param Collection $collection
     */
    // public function collection(Collection $collection)
    // {
    //     //
    // }

    public function model(array $row)
    {
        return new Artist([
            'name'     => $row[1],
            'dob'    => $row[2],
            'gender' => $row[3],
            'address' => $row[4],
            'first_release_year' => $row[5],
            'no_of_albums_released' => $row[6],
        ]);
    }
}
