<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Music;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->count();
        $artists = DB::table('artists')->count();
        $musics = DB::table('music')->count();
        return view('admin.dashboard', compact('users', 'artists', 'musics'));
    }
}
