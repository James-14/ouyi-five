<?php


namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Cache;


class Ticker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ticker';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display an inspiring quote';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       $this->getData();
//        for ($i=0;$i<9;$i++) {
//            $result = file_get_contents("https://aws.okex.com/api/spot/v3/instruments/ticker");
//            // 将json转化成数组
//            $rel = json_decode($result,true);
//            \Log::info("脚本输出:". $result);
//            sleep(5);
//        }
        //$this->comment(PHP_EOL.Inspiring::quote().PHP_EOL);
    }

    public function getData()
    {

        $url = "https://www.okex.com/api/spot/v3/instruments/ticker";
        try {
            $http = new \GuzzleHttp\Client;
            $response = $http->get($url);
        } catch (\Exception $e) {
            Log::error('/v3/instruments/ticker', ['msg' => $e->getMessage()]);
        }

        $total = json_decode((string)$response->getBody(), true);
        //保存数据
        $json = "[{
        \"best_ask\": \"0.003984\",
        \"best_bid\": \"0.00398\",
        \"instrument_id\": \"BTC\",
        \"open_utc0\": \"0.003916\",
        \"open_utc8\": \"0.004028\",
        \"product_id\": \"LTC-BTC\",
        \"last\": \"0.003979\",
        \"last_qty\": \"3.700587\",
        \"ask\": \"0.003984\",
        \"best_ask_size\": \"41.81668\",
        \"bid\": \"0.00398\",
        \"best_bid_size\": \"5.251292\",
        \"open_24h\": \"0.003986\",
        \"high_24h\": \"0.004082\",
        \"low_24h\": \"0.003859\",
        \"base_volume_24h\": \"163491.991513\",
        \"timestamp\": \"2021-01-13T03:17:45.687Z\",
        \"quote_volume_24h\": \"647.736463\"
    }]";

        $res = json_decode($json, true);
        foreach ($res as $value) {

            //文件缓存
            Cache::add($value['instrument_id'], json_encode($value), 5);

        }

        \Log::info("脚本输出:". json_encode($total));
    }
}
