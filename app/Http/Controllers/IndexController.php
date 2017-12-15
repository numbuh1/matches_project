<?php

namespace App\Http\Controllers;

use App\Match;
use App\Game;
use App\Team;
use App\League;
use Illuminate\Http\Request;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function index()
    {
        $games = Game::all();
        $teams = Team::all();
        $leagues = League::all();
        $matches = Match::all();
        return view('user.index')
            ->with('game', $games)
            ->with('team', $teams)
            ->with('league', $leagues)
            ->with('match', $matches);
    }

    public function build()
    {
        return view('user.build');
    }
}
