<?php


namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\logic\ActivityLogic;
use App\logic\QrcodeLogic;

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
        return response()->json($this->activity_logic->getListForWeb());
    }

    public function qrcode()
    {
        return response()->json($this->qrcode_logic->getOneForWeb());
    }

    //行情
    public function quotations()
    {
        //6个币种
        //BTC  ETH  OKB OKT LTC DOT
        $result = file_get_contents("https://aws.okex.com/api/spot/v3/instruments/ticker");
        // 将json转化成数组
        $rel = json_decode($result,true);
        dd($rel);
    }
}