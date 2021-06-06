<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;

class CommentController extends Controller
{
    public function update(Request $request)
    {
        try {
            $comment = Comment::findOrFail($request->mysql_id);
            $comment->content = $request->comment;
            $comment->save();
        } catch(ModelNotFoundException $e) {
            return 'fail';
        }
    }

    public function destroy(Request $request)
    {
        try {
            Comment::destroy($request->mysql_id);
        } catch(ModelNotFoundException $e) {
            return 'fail';
        }
    }
}
