<?php


namespace App\Console\Commands;

use App\model\Article;
use Illuminate\Console\Command;
use simple_html_dom;
use Illuminate\Support\Facades\Log;


class ArticleConsole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'article';

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
        for ($i = 1; $i<5; $i++) {
            $this->getData($i);
        }

    }

    public function getData($i)
    {
        $str = file_get_contents("https://www.chaindd.com/nictation".'/'.$i);
        $html = new simple_html_dom();
        $html->load($str);
        $divs = $html->find('.date');
        $ul = $divs[0]->next_sibling();
        foreach ($ul->children as $v) {
            $li_children = $v->children;
            if(empty($li_children) || count($li_children) < 1) {
                break;
            }
            $title = $desc = $time = '';
            $a_obj = $li_children[0]->find('a');
            $title = $a_obj[0]->plaintext;

            $p_obj = $li_children[1]->find('p');
            $desc = trim(reset($li_children[1]->nodes[0]->_));

            //div>.info>.source
            $div_children = $li_children[3]->children;
            $time = trim(reset($div_children[2]->nodes[0]->_));
            Log::info("脚本输出:" . $title.'--'.$desc.'---'.$time);
            if (empty($title) || empty($desc) || empty($time)) {
                continue;
            }

            Article::firstOrCreate([
                'title' => $title,
                'slug' => $desc,
                'release_time' => $time,
            ]);

        }
    }
}
