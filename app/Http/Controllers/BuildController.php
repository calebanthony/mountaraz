<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Ability;
use App\Battlerite;
use App\Build;
use App\BuildVotes;
use App\Champion;

class BuildController extends Controller
{
    /**
     * Shows builds and gives option for user to enter their own build
     */
    public function show($champion)
    {
        $champion = Champion::where('name', $champion)->first();
        $builds = Build::where('champion', $champion->name)
            ->get()
            ->sortByDesc(function ($build) {
                return $build->votes->sum('value');
            });

        return view('champion.builds', [
            'champion'  => $champion,
            'builds'    => $builds,
        ]);
    }

    /**
     * Creates a new build and stores it in the database
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $battlerites = explode(',', $request->battlerites);

        if (count($battlerites) < 5) {
            flash()->error('Whoops!', 'A build requires 5 battlerites!');
            return redirect()->back();
        }

        $user = Auth::user();

        $newBuild = [
            'author_id'     => $user->id,
            'author'        => $user->name,
            'champion'      => $request->champion,
            'battlerite_1'  => Battlerite::where('name', $battlerites[0])->first()->id,
            'battlerite_2'  => Battlerite::where('name', $battlerites[1])->first()->id,
            'battlerite_3'  => Battlerite::where('name', $battlerites[2])->first()->id,
            'battlerite_4'  => Battlerite::where('name', $battlerites[3])->first()->id,
            'battlerite_5'  => Battlerite::where('name', $battlerites[4])->first()->id,
        ];

        $build = Build::firstOrCreate($newBuild);

        flash()->success('Build Submitted!');
        return redirect("champions/{$request->champion}/builds");
    }

    /**
     * Submits a vote for a build
     *
     * @param Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function vote(Request $request, $build)
    {
        BuildVotes::updateOrCreate(
            [
                'user_id'    => auth()->user()->id,
                'build_id'   => $build,
            ],
            [
                'value'     => $request->vote_value == 'up' ? 1 : -1,
            ]
        );

        return redirect()->back();
    }
}
