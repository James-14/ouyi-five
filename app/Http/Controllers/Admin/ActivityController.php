<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\logic\ActivityLogic;
use Illuminate\Http\Request;

use App\Http\Requests;

class ActivityController extends Controller
{
    public $activity_logic;

    public function __construct()
    {
        $this->activity_logic = new ActivityLogic();
    }

    public function index(Request $request)
    {
        return response()->result($this->activity_logic->getListForAdmin($request));
    }

    public function save(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:50',
            'imgurl' => 'required|max:255',
            'status' => 'required',
        ]);
        $model = $this->activity_logic->saveData(
            $request['id'],
            $request['title'],
            $request['imgurl'],
            $request['status'],
            $request['orderly'],
            $request['jumplink']
        );
        return response()->result(['id' => $model['id']]);
    }

    public function delActivity(Request $request)
    {
        $this->validate($request,[
            'id' => 'required',
        ]);
        $res = $this->activity_logic->delData($request['id']);
        return response()->result(['res' => $res]);
    }
}
