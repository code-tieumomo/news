<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QueryLog extends Model
{
    use HasFactory;

    protected $table = 'query_logs';

    protected $fillable = [
    	'ip',
    	'query',
    	'time',
    	'message'
    ];
}
