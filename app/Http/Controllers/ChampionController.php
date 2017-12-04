<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Champion;

class ChampionController extends Controller
{
    /**
     * The root path for all champion-specific stuff.
     */
    public function index($champion)
    {
        $champion = Champion::where('name', $champion)->first();
        
        return view('champion.index', ['champion' => $champion]);
    }

    /**
     * Root path to select a champion to see the detailed view
     */
    public function home()
    {
        $champions = Champion::get();
        return view('champion.home', ['champions' => $champions]);
    }
}
