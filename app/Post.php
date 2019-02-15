<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function favorite()
    {
        return $this->hasMany('App\Favorite');
    }
}
