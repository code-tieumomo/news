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

            $factory = (new Factory())->withDatabaseUri('https://uet-news-2021-default-rtdb.firebaseio.com/');
            $database = $factory->createDatabase();
            $database->getReference('comments/' . $request->post_id . '/' . $request->firebase_key)->update([
                'comment' => $request->comment,
                'user' => $comment->user->name . ' <i class="fa fa-pencil text-danger" data-placement="top" data-toggle="tooltip" title="Edited by Admin"></i>'
            ]);
        } catch(ModelNotFoundException $e) {
            return 'fail';
        }
    }

    public function destroy(Request $request)
    {
        try {
            Comment::destroy($request->mysql_id);

            $factory = (new Factory())->withDatabaseUri('https://uet-news-2021-default-rtdb.firebaseio.com/');
            $database = $factory->createDatabase();
            $database->getReference('comments/' . $request->post_id . '/' . $request->firebase_key)->remove();
        } catch(ModelNotFoundException $e) {
            return 'fail';
        }
    }
}
