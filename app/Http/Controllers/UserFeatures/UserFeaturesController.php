<?php

namespace App\Http\Controllers\UserFeatures;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserFeaturesController extends Controller
{
    public function index()
    {
        $comments = Comment::with('post')->where('user_id', Auth::id())->orderBy('id', 'desc')->get();

        return view('user-features.home', compact(
            'comments'
        ));
    }

    public function putInfomations($name) {
        $name = trim($name);
        if ($name == "" || $name == null) {
            return response()->json([
                'errors' => [
                    'name' => ['Name can not be null.']
                ]
            ], 422);
        }
        Auth::user()->update([
            'name' => $name
        ]);

        return response()->json([
            'message' => 'Updated your infomation'
        ], 200);
    }

    public function putPassword($currentPassword, $newPassword, $confirmPassword) {
        $currentPassword = trim($currentPassword);
        $newPassword = trim($newPassword);
        $confirmPassword = trim($confirmPassword);
        if ($currentPassword == "" || $currentPassword == null || $newPassword == "" || $newPassword == null || $confirmPassword == "" || $confirmPassword == null) {
            return response()->json([
                'errors' => [
                    'password' => ['Password can not be null.']
                ]
            ], 422);
        }
        if (Hash::check($currentPassword, Auth::user()->password)) {
            if ($newPassword == $confirmPassword) {
                Auth::user()->update([
                    'password' => bcrypt($newPassword)
                ]);
            }
        } else {
            return response()->json([
                'errors' => [
                    'password' => ['Current password wrong.']
                ]
            ], 422);
        }

        return response()->json([
            'message' => 'Updated your password'
        ], 200);
    }

    function putComments($comment, $postId)
    {
        if ($comment == "" || $comment == null || $postId == "" || $postId == null) {
            return response()->json([
                'errors' => [
                    'field' => ['Missing parameter.']
                ]
            ], 422);
        }

        Comment::where('user_id', Auth::id())->where('post_id', $postId)->update([
            'content' => $comment
        ]);

        return response()->json([
            'message' => 'Updated your comment'
        ], 200);
    }
}
