<?php

namespace App\Http\Controllers;

use App\Match;
use App\Game;
use App\Team;
use App\League;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matches = Match::all();
        return view('admin.match.index')
            ->with('match', $matches);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $games = Game::all();
        $teams = Team::all();
        $leagues = League::all();
        return view('admin.match.create')
            ->with('game', $games)
            ->with('team', $teams)
            ->with('league', $leagues);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $match = new match();
        
        $match->leagueId = $request->input('league');
        $match->gameType = $request->input('game');
        $match->team1Id = $request->input('team1');
        $match->team2Id = $request->input('team2');
        $match->formatType = $request->input('format');

        $dt = Carbon::parse($request->input('date'));
        $dt->hour = explode(":", $request->input('time'))[0];
        $dt->minute = explode(":", $request->input('time'))[1];

        $match->timeStart = $dt;

        if ($match->save()) {
            return redirect('/matches');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show(Match $match)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function edit(Match $match)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Match $match)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy(Match $match)
    {
        //
    }
}
