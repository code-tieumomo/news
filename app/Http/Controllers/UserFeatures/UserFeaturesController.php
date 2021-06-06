<?php

namespace App\Http\Controllers\UserFeatures;

use App\Http\Controllers\Controller;
use App\Models\BecomeWriter;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserFeaturesController extends Controller
{
    public function index()
    {
        $comments = Comment::with('post')->where('user_id', Auth::id())->orderBy('id', 'desc')->get();

        return view('user-features.home', compact(
            'comments'
        ));
    }

    public function putInfomations(Request $request) {
        $name = trim($request->name);
        Auth::user()->update([
            'name' => $name
        ]);

        return response()->json([
            'message' => 'Updated your infomation'
        ], 200);
    }

    public function putPassword(Request $request) {
        $currentPassword = trim($request->currentPassword);
        $newPassword = trim($request->newPassword);
        $confirmPassword = trim($request->confirmPassword);
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

    function putComments(Request $request)
    {
        $comment = trim($request->comment);
        $postId = trim($request->postId);
        Comment::where('user_id', Auth::id())->where('post_id', $postId)->update([
            'content' => $comment
        ]);

        return response()->json([
            'message' => 'Updated your comment'
        ], 200);
    }

    function deleteComment($id)
    {
        Comment::find($id)->delete();

        return response()->json([
            'message' => 'Deleted your comment'
        ], 200);
    }

    function showBecomeWriter()
    {
        if (Auth::user()->getRoleNames()[0] == 'writer')
            return redirect()->back();

        return view('user-features.become-writer');
    }

    function postBecomeWriter(Request $request)
    {
        $becomeWriter = BecomeWriter::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address
        ]);
        $request->cv->move('admin-assets/cv/', 'CV_of_' . $becomeWriter->id . '.pdf');
        $request->sample_article->move('admin-assets/sample_article/', 'sample_article_of_' . $becomeWriter->id . '.pdf');

        $to_name = $request->name;
        $to_email = Auth::user()->email;
        $data = array(
            'name' => $request->name
        );
        Mail::send('emails.auto-reply-become-writer', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('Autoreply request become a writer at UET-News');
            $message->from('something.tieumomo@gmail.com');
        });

        return response()->json([
            'message' => 'Sent your request'
        ], 200);
    }
}
