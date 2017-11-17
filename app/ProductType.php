<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = 'product_types';

    public function type()
    {
        return $this->belongsTo('App\Product');
    }
}
