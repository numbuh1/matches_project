<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestType extends Model
{
    protected $fillable = [
        'name'
    ];

    public function type()
    {
        return $this->belongsTo('App\QuestType');
    }
}
