<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    public $incrementing = false;
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    protected $attributes = [
        'role' => 'user',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
