<?php


namespace App\logic;

use App\model\Article;



class ArticleLogic
{

    public function getListForWeb()
    {
        return Article::where('created_at', '<=', date("Y-m-d H:i:s"))
            ->where('created_at', '>', date("Y-m-d 00:00:00"))
            ->limit(40)
            ->orderBy('id', 'desc')
            ->orderBy("release_time", "desc")
            ->get()
            ->toArray();
    }
}