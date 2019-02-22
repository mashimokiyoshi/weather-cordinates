<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $guarded = ['id'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    
    public function Post()
    {
        return $this->belongsTo('App\Post');
    }
}
