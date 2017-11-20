<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';

    protected $fillable = [];

    public function game()
    {
        return $this->hasOne('App\Game', 'id', 'gameType');
    }
}
