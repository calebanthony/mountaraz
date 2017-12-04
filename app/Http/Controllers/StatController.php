<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Champion;

class StatController extends Controller
{
    /**
     * Shows statistics on the specified champion
     */
    public function show($championName)
    {
        $champion = Champion::where('name', $championName)->first();

        return view('champion.stats', [
            'champion'  => $champion
        ]);
    }
}
