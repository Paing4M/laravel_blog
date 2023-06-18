<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo('App\models\Category');
    }

    public function comments()
    {
        return $this->hasMany('App\models\Comment');
    }
}
