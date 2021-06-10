<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Models\BecomeWriter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WriterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $writers = User::role('writer')->orderBy('id', 'desc')->get();

        return view('admin.writer', [
            'writers' => $writers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Comment::where('user_id', $id)->delete();
            $posts = Post::where('user_id', $id)->get();
            foreach ($posts as $post) {
                Comment::where('post_id', $post->id)->delete();
            }
            Post::where('user_id', $id)->delete();
            User::destroy($id);

            return 'success';
        } catch (ModelNotFoundException $e) {
            return 'fail';
        }
    }

    public function removeWritePermission($id)
    {
        try {
            $posts = Post::where('user_id', $id)->get();
            foreach ($posts as $post) {
                Comment::where('post_id', $post->id)->delete();
            }
            Post::where('user_id', $id)->delete();
            $user = User::find($id);
            $user->removeRole('writer');
            $user->assignRole('user');

            return 'success';
        } catch (ModelNotFoundException $e) {
            return 'fail';
        }
    }

    public function denyWriterRequest($id)
    {
        try {
            $request = BecomeWriter::findOrFail($id);
            $to_name = $request->name;
            $to_email = $request->user->email;
            $data = array(
                'name' => $request->name
            );
            Mail::send('emails.auto-reply-deny-writer-request', $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)->subject('Autoreply request become a writer at UET-News');
                $message->from('something.tieumomo@gmail.com');
            });

            $request->delete();

            return 'success';
        } catch (ModelNotFoundException $e) {
            return 'fail';
        }
    }

    public function approveWriterRequest($id)
    {
        try {
            $request = BecomeWriter::findOrFail($id);
            $user = $request->user;
            $user->removeRole('user');
            $user->assignRole('writer');
            $to_name = $request->name;
            $to_email = $user->email;
            $data = array(
                'name' => $request->name
            );
            Mail::send('emails.auto-reply-approve-writer-request', $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)->subject('Autoreply request become a writer at UET-News');
                $message->from('something.tieumomo@gmail.com');
            });

            $request->delete();

            return 'success';
        } catch (ModelNotFoundException $e) {
            return 'fail';
        }
    }
}
