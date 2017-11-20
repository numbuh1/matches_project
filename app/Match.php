<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    public function game()
    {
        return $this->hasOne('App\Game', 'id', 'gameType');
    }

    public function league()
    {
        return $this->hasOne('App\League', 'id', 'leagueId');
    }

    public function team1()
    {
        return $this->hasOne('App\Team', 'id', 'team1Id');
    }

    public function team2()
    {
        return $this->hasOne('App\Team', 'id', 'team2Id');
    }
}
