<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public $table='activity';
    protected $fillable = [
        'id','title', 'imgurl', 'status','orderly','jumplink'
    ];

    protected $hidden = [
        'opertor_id', 'created_at','updated_at'
    ];
}
