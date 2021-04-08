<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $totalPosts = Post::count();
        $totalUsers = User::where('role_id', '1')->get()->count();
        $totalWriters = User::where('role_id', '2')->get()->count();
        $totalComments = Comment::count();
        $recentUsers = User::where('role_id', '1')->orderBy('id', 'desc')->limit(6)->get();
        $recentWriters = User::where('role_id', '2')->orderBy('id', 'desc')->limit(6)->get();

        return view('admin.home', [
            'totalPosts' => $totalPosts,
            'totalUsers' => $totalUsers,
            'totalWriters' => $totalWriters,
            'totalComments' => $totalComments,
            'recentUsers' => $recentUsers,
            'recentWriters' => $recentWriters,
        ]);
    }
}
