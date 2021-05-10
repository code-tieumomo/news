<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }

        // DB::listen(function ($query) {
        //     // $file = fopen(Storage::disk('local')->path('logs/queries.log'), 'a');
        //     // fwrite($file, PHP_EOL . '▶ [' . Carbon::now() . '] Query: ' . Str::replaceArray('?', $query->bindings, $query->sql) . ' - in ' . $query->time . ' s');
        //     Storage::disk('local')->append('logs/queries.log', '▶ [' . Carbon::now() . '] Query: ' . Str::replaceArray('?', $query->bindings, $query->sql) . ' - in ' . $query->time . ' s'); 
        // }); 

        /**
         * Paginate a standard Laravel Collection.
         *
         * @param int $perPage
         * @param int $total
         * @param int $page
         * @param string $pageName
         * @return array
         */
        Collection::macro('paginate', function($perPage, $total = null, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

            return new LengthAwarePaginator(
                $this->forPage($page, $perPage),
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });
    }
}
