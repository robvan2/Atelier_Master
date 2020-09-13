<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
