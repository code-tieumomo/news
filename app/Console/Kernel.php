<?php

namespace App\Console;

use App\Models\Post;
use App\Models\Vietnamnet;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use willvincent\Feeds\Facades\FeedsFacade;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            $feedUrls = [
                'https://vietnamnet.vn/rss/thoi-su-chinh-tri.rss',
                'https://vietnamnet.vn/rss/talkshow.rss',
                'https://vietnamnet.vn/rss/thoi-su.rss',
                'https://vietnamnet.vn/rss/kinh-doanh.rss',
                'https://vietnamnet.vn/rss/giai-tri.rss',
                'https://vietnamnet.vn/rss/the-gioi.rss',
                'https://vietnamnet.vn/rss/giao-duc.rss',
                'https://vietnamnet.vn/rss/doi-song.rss',
                'https://vietnamnet.vn/rss/phap-luat.rss',
                'https://vietnamnet.vn/rss/the-thao.rss',
                'https://vietnamnet.vn/rss/cong-nghe.rss',
                'https://vietnamnet.vn/rss/suc-khoe.rss',
                'https://vietnamnet.vn/rss/bat-dong-san.rss',
                'https://vietnamnet.vn/rss/ban-doc.rss',
                'https://vietnamnet.vn/rss/tuanvietnam.rss',
                'https://vietnamnet.vn/rss/oto-xe-may.rss',
                'https://vietnamnet.vn/rss/goc-nhin-thang.rss',
                'https://vietnamnet.vn/rss/tin-moi-nong.rss',
                'https://vietnamnet.vn/rss/tin-moi-nhat.rss'
            ];
            foreach ($feedUrls as $url) {
                $feed = FeedsFacade::make($url);
                $items = $feed->get_items();
                foreach ($items as $item) {
                    $subCategoryId = rand(1, 112);
                    $title = $item->get_title();
                    $slug = Str::slug($title, '-');
                    $post = Post::where('slug', $slug)->first();
                    if ($post) {
                        Log::warning('Skip duplicate item : ' . $title);
                        continue;
                    }
                    $sumary = $item->get_description();
                    $content = $item->get_content();
                    $thumbnail = $item->get_enclosure()->get_link();

                    Post::create([
                        'title' => $title,
                        'sumary' => $sumary,
                        'content' => $content,
                        'thumbnail' => $thumbnail,
                        'slug' => Str::slug($title, '-'),
                        'user_id' => 1,
                        'sub_category_id' => $subCategoryId
                    ]);

                    Log::notice('Added item: ' . $title);
                }
            }
        })->everyMinute();

        // * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
