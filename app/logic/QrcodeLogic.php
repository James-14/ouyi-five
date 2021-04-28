<?php


namespace App\logic;

use App\model\Qrcode;



class QrcodeLogic
{
    const STATUS_NO = 1;
    const STATUS_YES = 2;

    public function getListForWeb()
    {
        return Qrcode::where('status', '=', self::STATUS_YES)->limit(3)->orderBy("id", "desc")->get();
    }
}