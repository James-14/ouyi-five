<?php


namespace App\logic;

use App\model\Qrcode;



class QrcodeLogic
{
    const STATUS_NO = 1;
    const STATUS_YES = 2;

    public function getOneForWeb()
    {
        return Qrcode::where('status', '=', self::STATUS_YES)->limit(1)->orderBy("id", "desc")->get();
    }
}