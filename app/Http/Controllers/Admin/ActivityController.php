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

    public function index()
    {
        return response()->result($this->activity_logic->getListForWeb());
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:50',
            'imgurl' => 'required|max:255',
            'status' => 'required',
        ]);
        $model = $this->activity_logic->createData(
            $request['title'],
            $request['imgurl'],
            $request['status'],
            $request['orderly'],
            $request['jumplink']
        );
        return response()->result(['id' => $model['id']]);

    }
}
