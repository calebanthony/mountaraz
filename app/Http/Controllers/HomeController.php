<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Champion;
use App\Counter;
use App\Tip;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $champions = Champion::all();
        $counters = Counter::orderByDesc('created_at')->take(10)->get();
        $tips = Tip::orderByDesc('created_at')->take(10)->get();
        
        return view('home', [
            'champions' => $champions,
            'tips'      => $tips,
            'counters'  => $counters,
        ]);
    }
}
