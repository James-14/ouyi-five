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
        return response()->json($this->activity_logic->getListForWeb());
    }

    public function create(array $data)
    {
/*
 * User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
 */


    }
}
