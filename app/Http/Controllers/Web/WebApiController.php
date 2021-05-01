<?php


namespace App\Http\Controllers\Web;


use App\Enums\CacheConst;
use App\Enums\CoinConst;
use App\Http\Controllers\Controller;
use App\logic\ActivityLogic;
use App\logic\QrcodeLogic;
use App\logic\TickerLogic;
use App\model\Ticker;
use Illuminate\Support\Facades\Cache;

class WebApiController extends Controller
{
    public $activity_logic;
    public $qrcode_logic;
    public $ticker_logic;

    public function __construct()
    {
        $this->activity_logic = new ActivityLogic();
        $this->qrcode_logic = new QrcodeLogic();
        $this->ticker_logic = new TickerLogic();
    }

    public function activity()
    {
        $infoList=$this->activity_logic->getListForWeb();

        return response()->result($infoList);
    }

    public function common()
    {
//        Cache::forever(CacheConst::QRCODE_URL_KEY, "https://www.baidu.com/img/flexible/logo/pc/result.png");
//        Cache::forever(CacheConst::API_JUMP_URL, 'https://www.baidu.com');
        $res = [
            'qrcode' => Cache::get(CacheConst::QRCODE_URL_KEY),
            'jump_url' => Cache::get(CacheConst::API_JUMP_URL),
        ];
        return response()->result($res);
    }

    //主流
    public function mainstream()
    {
        return response()->result($this->ticker_logic->getMainstream());
    }

    //涨跌
    public function upDown()
    {
        return response()->result($this->ticker_logic->getUpDown());
    }

    //成交
    public function volume()
    {
        return response()->result($this->ticker_logic->getVolume());
    }
}