<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    public function game()
    {
        return $this->hasOne('App\Game', 'id', 'gameType');
    }
}
