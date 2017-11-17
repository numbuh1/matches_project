<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quest extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'name', 'description'
    ];

    public function type()
    {
        return $this->hasOne('App\QuestType');
    }
}
