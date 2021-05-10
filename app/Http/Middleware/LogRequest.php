<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LogRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }

    /**
     * Handle tasks after the response has been sent to the browser.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\Response  $response
     * @return void
     */
    public function terminate($request, $response)
    {
        $ip = $request->ip();
        $method = $request->method();
        $url = $request->url();
        $protocol = $request->secure() ? 'HTTPS' : 'HTTP/1.1';
        $status = $response->status();
        $responseTime = microtime(true) - LARAVEL_START;
        if ($status >= 400) {
            if (strpos($response->content(), '"message":"') >= 0) {
                $startPos = strpos($response->content(), '"message":"');
                $message = substr($response->content(), $startPos + 11, strpos($response->content(), '"}', $startPos) - $startPos - 11);
            } else {
                foreach(preg_split("/((\r?\n)|(\r\n?))/", $response->content()) as $line){
                    $startPos = strpos($response->content(), '<noscript><pre>');
                    if ($startPos >= 0) {
                        $message = substr($response->content(), $startPos + 15, strpos($response->content(), '#0', $startPos) - $startPos - 15);
                    } else {
                        $message = 'No message found';
                    }
                }
            }
        } else {
            $message = 'Success';
        }
        Storage::disk('local')->append('logs/requests.log', PHP_EOL . '▶ [' . Carbon::now() . '] - From: ' . $ip . ' "' . $method . '" > ' . $url . ' (' . $protocol . ') finish in: ' . $responseTime . 's || ' . $status . " " . $message);
    }
}
