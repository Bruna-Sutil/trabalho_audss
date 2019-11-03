<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    public function user() {
        return $this->belongsTo('App\User');
    }

    protected $fillable = [
        'name',
        'image',
        'user_id'
    ];
    
}
