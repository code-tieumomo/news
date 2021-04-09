<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class WriterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $writers = User::where('role_id', 2)->orderBy('id', 'desc')->get();

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
            User::find($id)->update([
                'role_id' => 1
            ]);

            return 'success';
        } catch (ModelNotFoundException $e) {
            return 'fail';
        }
    }
}
