<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function team()
    {
        return $this->belongsToMany('App\Team', 'id', 'gameType');
    }
}
