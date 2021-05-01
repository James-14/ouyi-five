<?php


namespace App\logic;


use App\Enums\CoinConst;
use App\model\Ticker;

class TickerLogic
{
    public function getMainstream()
    {
        $result = [];
        foreach (CoinConst::$coin_types as $type) {
            $temp = Ticker::where('instrument_id', $type."-".CoinConst::COIN_SUFFIX)->first();
            if (empty($temp)) {
                continue;
            }
            $result[] = $temp;
        }
        return $result;
    }

    public function getUpDown()
    {
        return Ticker::orderBy('up_down', 'desc')->get();
    }

    public function getVolume()
    {
        return Ticker::orderBy('quote_volume_24h', 'desc')->get();
    }
}