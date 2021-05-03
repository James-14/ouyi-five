<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $table='article';
    protected $fillable = [
        'id','title', 'slug', 'release_time'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];
}
