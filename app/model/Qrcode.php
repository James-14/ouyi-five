<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Qrcode extends Model
{
    public $table='qrcode';
    protected $fillable = [
        'id','title', 'imgurl', 'status',
    ];

    protected $hidden = [
        'opertor_id', 'created_at','updated_at'
    ];
}
