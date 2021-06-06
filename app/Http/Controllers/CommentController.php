<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment(Request $request)
    {
        $content = trim($request->content);
        $comment = Comment::create([
            'content' => $content,
            'user_id' => Auth::id(),
            'post_id' => $request->post_id
        ]);
        $date = $comment->created_at->toDateTimeString();
        $id = $comment->id;

        return response()->json([
            'message' => 'Commented',
            'date' => $date,
            'id' => $id
        ], 200);
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        if ($comment->user_id == Auth::id()) {
            $comment->delete();
        } else {
            return response()->json([
                'message' => 'Failed while deleting',
            ], 403);
        }

        return response()->json([
            'message' => 'Deleted',
        ], 200);
    }

    public function update(Request $request)
    {
        $comment = Comment::find($request->id);
        if ($comment->user_id == Auth::id()) {
            $comment->update([
                'content' => trim($request->content)
            ]);
        } else {
            return response()->json([
                'message' => 'Failed while updating',
            ], 403);
        }

        return response()->json([
            'message' => 'Updated',
        ], 200);
    }
}
