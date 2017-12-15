<?php

namespace App\Http\Controllers;

use App\League;
use App\Game;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LeagueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leagues = League::all();
        $games = Game::all();
        return view('admin.league.index')
            ->with('league', $leagues)
            ->with('game', $games);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $games = Game::all();
        return view('admin.league.create')
            ->with('game', $games);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $league = new League();
        
        $league->name = $request->input('name');
        $league->gameType = $request->input('game');
        $league->logo = $request->input('logo');
        $league->country = $request->input('country');
        $league->countryId = $request->input('countryId');
        $league->description = $request->input('description');
        $league->location = $request->input('location');
        $league->dateStart = Carbon::parse($request->input('dateStart'));
        $league->dateEnd = Carbon::parse($request->input('dateEnd'));

        if ($league->save()) {
            return redirect('/leagues');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
