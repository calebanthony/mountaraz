<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Champion;
use App\Counter;
use App\CounterVotes;

class CounterController extends Controller
{
    /**
     * Shows counters for all champions, based on what was recently posted.
     */
    public function index()
    {
        $counters = Counter::orderByDesc('created_at')->take(20)->get();

        return view('summary.counters', [
            'counters' => $counters,
        ]);
    }

    /**
     * Shows counters and gives option for user to enter their own tips for countering
     */
    public function show($championName)
    {
        $champion = Champion::where('name', $championName)->first();
        $counters = Counter::where('champion', $champion->name)
            ->get()
            ->sortByDesc(function ($counter) {
                return $counter->votes->sum('value');
            });

        return view('champion.counters', [
            'champion'  => $champion,
            'counters'  => $counters,
        ]);
    }

    /**
     * Stores counters in the database.
     *
     * @param Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        
        $newCounter = [
            'author_id' => $user->id,
            'author'    => $user->name,
            'champion'  => $request->champion,
            'counter'   => $request->counter,
        ];

        Counter::create($newCounter);

        flash()->success('Counter Submitted!');
        return redirect("champions/{$request->champion}/counters");
    }

    /**
     * Submits a vote for a counter
     *
     * @param Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function vote(Request $request, $counter)
    {
        CounterVotes::updateOrCreate(
            [
                'user_id'    => auth()->user()->id,
                'counter_id' => $counter,
            ],
            [
                'value'     => $request->vote_value == 'up' ? 1 : -1,
            ]
        );

        return redirect()->back();
    }
}
