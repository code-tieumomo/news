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
        $totalUsers = User::role('user')->get()->count();
        $totalWriters = User::role('writer')->get()->count();
        $totalComments = Comment::count();
        $recentUsers = User::role('user')->orderBy('id', 'desc')->limit(6)->get();
        $recentWriters = User::role('writer')->orderBy('id', 'desc')->limit(6)->get();

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
