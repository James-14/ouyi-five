<?php


namespace App\Http\Controllers\Web;


use App\Enums\CoinConst;
use App\Http\Controllers\Controller;
use App\logic\ActivityLogic;
use App\logic\QrcodeLogic;
use App\model\Ticker;
use Illuminate\Support\Facades\Cache;

class WebApiController extends Controller
{
    public $activity_logic;
    public $qrcode_logic;

    public function __construct()
    {
        $this->activity_logic = new ActivityLogic();
        $this->qrcode_logic = new QrcodeLogic();
    }

    public function activity()
    {
        $infoList=$this->activity_logic->getListForWeb();

        return response()->result($infoList);
    }

    public function qrcode()
    {
        return response()->json($this->qrcode_logic->getOneForWeb());
    }

    //行情
    public function quotations()
    {
        //6个币种
        //保存数据
        $json = '[{"best_ask": "0.1111111111111111111111", "best_bid": "0.33333333", "instrument_id": "BTC", "open_utc0": "0.222222", "open_utc8": "0.22222", "product_id": "LTC-BTC", "last": "0.003979", "last_qty": "3.700587", "ask": "0.003984", "best_ask_size": "41.81668", "bid": "0.00398", "best_bid_size": "5.251292", "open_24h": "0.003986", "high_24h": "0.004082", "low_24h": "0.003859", "base_volume_24h": "163491.991513", "timestamp": "2021-01-13T03:17:45.687Z", "quote_volume_24h": "647.736463"}]';

        $res = json_decode($json, true);
        foreach ($res as $value) {
            //BTC  ETH  OKB OKT LTC DOT
           Ticker::insert([
               'instrument_id' => $value['instrument_id'],
               'last' => $value['last'],
               'last_qty' => $value['last_qty'],
               'best_ask' => $value['best_ask'],
               'best_ask_size' => $value['best_ask_size'],
               'best_bid' => $value['best_bid'],
               'best_bid_size' => $value['best_bid_size'],
               'open_24h' => $value['open_24h'],
               'high_24h' => $value['high_24h'],
               'low_24h' => $value['low_24h'],
               'base_volume_24h' => $value['base_volume_24h'],
               'quote_volume_24h' => $value['quote_volume_24h'],
               'timestamp' => $value['timestamp'],
               'open_utc0' => $value['open_utc0'],
               'open_utc8' => $value['open_utc8']
           ]);


        }

    }
}