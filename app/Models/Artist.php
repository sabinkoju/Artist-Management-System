<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dob',
        'gender',
        'address',
        'first_release_year',
        'no_of_albums_released',
    ];

    public function songs()
    {
        return $this->hasMany(Music::class);
    }

    // Add an event listener to delete songs when an artist is deleted
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($artist) {
            // Delete all songs associated with the artist
            $artist->songs()->delete();
        });
    }
}
