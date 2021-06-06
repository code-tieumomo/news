<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.post', [
            'posts' => $posts
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
        try {
            $post = Post::findOrFail($id);
            $comments = Comment::with('user')->where('post_id', $id)->orderBy('id', 'desc')->get();

            return view('admin.post-detail', [
                'post' => $post,
                'comments' => $comments
            ]);
        } catch(ModelNotFoundException $e) {
            abort(404);
        }
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
        $post = Post::find($id);
        $post->update([
            'title' => $request->title,
            'sumary' => $request->sumary,
            'content' => $request->content,
        ]);

        if ($request->file('thumbnail') != null) {
            $image = 'data:image/png;base64, ' . base64_encode(file_get_contents($request->file('thumbnail')));
            $post->update([
                'thumbnail' => $image
            ]);
        }

        return "success";
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
            Comment::where('post_id', $id)->delete();
            Post::destroy($id);

            $factory = (new Factory())->withDatabaseUri('https://uet-news-2021-default-rtdb.firebaseio.com/');
            $database = $factory->createDatabase();
            $database->getReference('comments/' . $id)->remove();

            return 'success';
        } catch(ModelNotFoundException $e) {
            return 'fail';
        }
    }
}
