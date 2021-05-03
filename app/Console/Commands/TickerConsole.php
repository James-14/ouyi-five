<?php


namespace App\Console\Commands;

use App\Enums\CoinConst;
use App\model\Ticker;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;


class TickerConsole extends Command
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
            $http = new Client;
            $response = $http->get($url);
        } catch (\Exception $e) {
            Log::error('/v3/instruments/ticker', ['msg' => $e->getMessage()]);
            return;
        }

        $total = json_decode((string)$response->getBody(), true);

        foreach ($total as $value) {
            //过滤掉名称中不包含USDT的
            if (strpos($value['instrument_id'], CoinConst::COIN_SUFFIX) === false) {
                continue;
            }

            //计算幅度
            $up_down = ($value['open_utc8'] - $value['last']) / $value['last'] ;
            $dao = Ticker::where('instrument_id', $value['instrument_id'])->first();
            if (!$dao['id']) {
                $dao = Ticker::insert([
                    'instrument_id' => $value['instrument_id'],
                    'last' => $value['last'],
                    'last_qty' => $value['last_qty'],
                    'best_ask' => $value['best_ask'],
                    'best_ask_size' => $value['best_ask_size'],
                    'best_bid' => $value['best_bid'],
                    'best_bid_size' => $value['best_bid_size'],
                    'open_24h' => $value['open_24h'],
                    'high_24h' => $value['high_24h'],
                    'low_24h' => $value['low_24h'],
                    'base_volume_24h' => $value['base_volume_24h'],
                    'quote_volume_24h' => $value['quote_volume_24h'],
                    'timestamp' => $value['timestamp'],
                    'open_utc0' => $value['open_utc0'],
                    'open_utc8' => $value['open_utc8'],
                ]);
            }
            //更新涨幅
            Ticker::where('id', $dao['id'])->update(
                [
                    'instrument_id' => $value['instrument_id'],
                    'last' => $value['last'],
                    'last_qty' => $value['last_qty'],
                    'best_ask' => $value['best_ask'],
                    'best_ask_size' => $value['best_ask_size'],
                    'best_bid' => $value['best_bid'],
                    'best_bid_size' => $value['best_bid_size'],
                    'open_24h' => $value['open_24h'],
                    'high_24h' => $value['high_24h'],
                    'low_24h' => $value['low_24h'],
                    'base_volume_24h' => $value['base_volume_24h'],
                    'quote_volume_24h' => $value['quote_volume_24h'],
                    'timestamp' => $value['timestamp'],
                    'open_utc0' => $value['open_utc0'],
                    'open_utc8' => $value['open_utc8'],
                    'up_down' => sprintf("%.2f",$up_down * 100),
                ]
            );

        }

    }
}
