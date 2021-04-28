<?php


namespace App\Http\Controllers\Web;


use App\logic\ActivityLogic;
use App\logic\QrcodeLogic;

class WebApiController
{
    public $activity_logic;
    public $qrcode_logic;

    public function __construct()
    {
        $this->activity_logic = new ActivityLogic();
        $this->qrcode_logic = new QrcodeLogic();
    }
}