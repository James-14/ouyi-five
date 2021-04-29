<?php


namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;


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
        for ($i=0;$i<9;$i++) {
            $result = file_get_contents("https://aws.okex.com/api/spot/v3/instruments/ticker");
            // 将json转化成数组
            $rel = json_decode($result,true);
            \Log::info("脚本输出:". $result);
            sleep(5);
        }
        //$this->comment(PHP_EOL.Inspiring::quote().PHP_EOL);
    }

    public function getData()
    {

        $url = "oauth/connect/token";
        try {
            $http = new \GuzzleHttp\Client;
            $response = $http->post($url, ['form_params' => ['grant_type' => $grant_type, 'client_id' => $client_id, 'client_secret' => $client_secret,
                'redirect_uri' => $redirect_uri, 'code' => $code],]);
        } catch (\Exception $e) {
            Log::info('curl_oauth/connect/token', ['msg' => $e->getMessage(), 'code' => $code, 'time' => date('Y-m-d H:i:s', time())]);
        }

        $total = json_decode((string)$response->getBody(), true);

    }
}
