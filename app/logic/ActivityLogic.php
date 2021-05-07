<?php


namespace App\logic;

use App\model\Activity;


class ActivityLogic
{
    const STATUS_NO = 1;
    const STATUS_YES = 2;

    public function getListForWeb()
    {
        $sql = Activity::where('status', '=', self::STATUS_YES);
        $list = $sql->orderBy("orderly", "asc")->get();
        return $list;
    }

    public function getListForAdmin($request)
    {
        $sql=Activity::where('jumplink','!=','');
        if ($request['status']) {
            $sql=$sql->where('status', '=', $request['status']);
        }
        if ($request['title']) {
            $sql=$sql->where('title', 'like', '%'.$request['title'].'%');
        }
        $count = $sql->count();

        $pageIndex = 1;
        if ($request['pageIndex']) {
            $pageIndex = $request['pageIndex'];
        }
        $pageSize = 10;
        if ($request['pageSize']) {
            $pageSize = $request['pageSize'];
        }
        $skip = ($pageIndex - 1) * $pageSize;
        if ($skip > 0) {
            $sql = $sql->offset($skip);
        }
        $list = $sql->limit($pageSize)->orderBy("orderly", "asc")->get();        
        return ['list' => $list, 'count' => $count, 'pageIndex' => $pageIndex, 'pageSize' => $pageSize];
    }

    public function saveData($id = '', $title, $imgurl, $status, $orderly, $jumplink)
    {
        if($id) {
            //update
            return Activity::where('id', $id)->update([
                'title' => $title,
                'imgurl' => $imgurl,
                'status' => $status,
                'orderly' => $orderly,
                'jumplink' => $jumplink,
            ]);
        } else {
            return Activity::create([
                'title' => $title,
                'imgurl' => $imgurl,
                'status' => $status,
                'orderly' => $orderly,
                'jumplink' => $jumplink,
            ]);
        }

    }

    public function delData($id)
    {
        return Activity::where('id', $id)->update([
            'status' => self::STATUS_NO
        ]);
    }
}