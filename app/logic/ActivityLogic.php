<?php


namespace App\logic;

use App\model\Activity;



class ActivityLogic
{
    const STATUS_NO = 1;
    const STATUS_YES = 2;

    public function getListForWeb()
    {
        return Activity::where('status', '=', self::STATUS_YES)->orderBy("orderly", "asc")->get();
    }

    public function createData($title, $imgurl, $status, $orderly, $jumplink)
    {
        return Activity::create([
            'title' => $title,
            'imgurl' => $imgurl,
            'status' => $status,
            'orderly' => $orderly,
            'jumplink' => $jumplink,
        ]);
    }
}