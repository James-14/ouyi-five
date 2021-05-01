<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Ticker extends Model
{
    public $table='ticker';
    public $timestamps = true;
    protected $fillable = [
        'instrument_id', 'last', 'last_qty', 'best_ask', 'best_ask_size', 'best_bid', 'best_bid_size', 'open_24h', 'high_24h', 'low_24h', 'base_volume_24h', 'quote_volume_24h', 'timestamp', 'open_utc0', 'open_utc8','up_down'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];
}