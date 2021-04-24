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
            $feed = FeedsFacade::make('https://vietnamnet.vn/rss/tin-moi-nhat.rss');
            $items = $feed->get_items();
            foreach ($items as $item) {
                $subCategory = $item->get_category()->get_term();
                $subCategoryId = Vietnamnet::where('name', $subCategory)->first();
                if ($subCategoryId == null) {
                    Log::warning('Skip item with wrong category: ' . $subCategory);
                    continue;
                }
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
                    'sub_category_id' => $subCategoryId->id
                ]);
                
                Log::notice('Added item: ' . $title);
            }
        })->everyMinute();
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
