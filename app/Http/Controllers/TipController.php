<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Champion;
use App\Tip;
use App\TipVotes;

class TipController extends Controller
{
    /**
     * Shows tips for all champions, based on what was recently posted.
     */
    public function index()
    {
        $tips = Tip::orderByDesc('created_at')->take(20)->get();

        return view('summary.tips', [
            'tips' => $tips,
        ]);
    }

    /**
     * Shows tips for a specific champion and gives option for user to enter their own tip
     *
     * @param string $champion
     * @return void
     */
    public function show($championName)
    {
        $champion = Champion::where('name', $championName)->first();
        $tips = Tip::where('champion', $champion->name)
            ->get()
            ->sortByDesc(function ($tip) {
                return $tip->votes->sum('value');
            });

        return view('champion.tips', [
            'champion'  => $champion,
            'tips'      => $tips,
        ]);
    }

    /**
     * Stores tips in the database.
     *
     * @param Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        
        $newTip = [
            'author_id' => $user->id,
            'author'    => $user->name,
            'champion'  => $request->champion,
            'tip'       => $request->tip,
        ];

        Tip::create($newTip);

        flash()->success('Tip Submitted!');
        return redirect("champions/{$request->champion}/tips");
    }

    /**
     * Submits a vote for a tip
     *
     * @param Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function vote(Request $request, $tip)
    {
        TipVotes::updateOrCreate(
            [
                'user_id'   => auth()->user()->id,
                'tip_id'    => $tip,
            ],
            [
                'value'     => $request->vote_value == 'up' ? 1 : -1,
            ]
        );

        return redirect()->back();
    }
}
