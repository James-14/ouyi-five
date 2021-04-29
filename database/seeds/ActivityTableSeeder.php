<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\model\Activity;


class ActivityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('activity')->delete();

        Activity::create([
            'id'=>'1',
            'imgurl'=>'https://www.pcteam.com/files/1576735870298_1558687953298_%E5%9B%BE%E7%89%873.png',
            'jumplink'=>'https://www.baidu.com',
            'status'=>2,
            'orderly'=>1
        ]);
        Activity::create([
            'id'=>'2',
            'imgurl'=>'https://www.pcteam.com/files/1576735870298_1558687953298_%E5%9B%BE%E7%89%873.png',
            'jumplink'=>'https://www.163.com',
            'status'=>2,
            'orderly'=>2
        ]);
        Activity::create([
            'id'=>'3',
            'imgurl'=>'https://www.pcteam.com/files/1576735870298_1558687953298_%E5%9B%BE%E7%89%873.png',
            'jumplink'=>'https://www.baidu.com',
            'status'=>2,
            'orderly'=>3
        ]);
    }
}
