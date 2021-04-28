<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\logic\QrcodeLogic;
use App\model\Qrcode;
use Illuminate\Http\Request;

use App\Http\Requests;

class QrcodeController extends Controller
{
    public $qrcode_logic;

    public function __construct()
    {
        $this->qrcode_logic = new QrcodeLogic();
    }

    public function index()
    {
        return response()->json($this->qrcode_logic->getOneForWeb());
    }
}
