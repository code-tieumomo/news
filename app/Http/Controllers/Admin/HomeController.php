<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Models\BecomeWriter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        $totalPosts = Post::count();
        $totalUsers = User::role('user')->get()->count();
        $totalWriters = User::role('writer')->get()->count();
        $totalComments = Comment::count();
        $recentUsers = User::role('user')->orderBy('id', 'desc')->limit(3)->get();
        $recentWriters = User::role('writer')->orderBy('id', 'desc')->limit(3)->get();
        $totalWriterRequest = BecomeWriter::count();

        for($i = 6; $i >= 0; $i--) {
            $dateToQuery = date('Y-m-d', strtotime('-' . $i . ' day'));
            $dateToShow = date('d-m', strtotime('-' . $i . ' day'));
            $res = DB::select("SELECT COUNT(*) AS VIEW FROM views WHERE `viewed_at` LIKE '%$dateToQuery%'");
            $viewPerDay[$dateToShow] = $res[0]->VIEW;
            $res = DB::select("SELECT COUNT(*) AS POST FROM posts WHERE `created_at` LIKE '%$dateToQuery%'");
            $postPerDay[] = $res[0]->POST;
        }

        $recentWR = BecomeWriter::with('user')->orderBy('id', 'DESC')->get();

        return view('admin.home', [
            'totalPosts' => $totalPosts,
            'totalUsers' => $totalUsers,
            'totalWriters' => $totalWriters,
            'totalComments' => $totalComments,
            'recentUsers' => $recentUsers,
            'recentWriters' => $recentWriters,
            'totalWriterRequest' => $totalWriterRequest,
            'viewPerDay' => $viewPerDay,
            'postPerDay' => $postPerDay,
            'recentWR' => $recentWR
        ]);
    }
}
