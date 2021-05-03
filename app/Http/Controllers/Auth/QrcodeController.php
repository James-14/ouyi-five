<?php

namespace App\Http\Controllers;

use App\logic\ArticleLogic;
use App\model\Qrcode;
use Illuminate\Http\Request;

use App\Http\Requests;

class QrcodeController extends Controller
{
    public $qrcode_logic;

    public function __construct()
    {
        $this->qrcode_logic = new ArticleLogic();
    }

    public function index()
    {
        return response()->json($this->qrcode_logic->getOneForWeb());
    }
}
