<?php

namespace App\Http\Controllers;

use App\Models\QueryLog;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        $queryLogs = QueryLog::orderBy('id', 'desc')->limit(10)->get();
        foreach ($queryLogs as $log) {
            echo "<pre>";
            print_r('[' . $log->created_at . '] ' . $log->ip . ' - ' . $log->query . ' - ' . $log->time . 's - ' . $log->message);
            echo "</pre>";
        }
    }
}
