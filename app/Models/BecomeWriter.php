<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BecomeWriter extends Model
{
    use HasFactory;

    protected $table = 'become_writers';

    protected $fillable = [
        'user_id', 'name', 'phone', 'address', 'created_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
