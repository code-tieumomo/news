<?php

namespace App\Http\Controllers\UserFeatures;

use App\Http\Controllers\Controller;
use App\Models\BecomeWriter;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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

    function showPosts()
    {
        $posts = Post::where('user_id', '=', Auth::id())->get();

        return view('user-features.post', [
            'posts' => $posts
        ]);
    }

    public function destroyPost($id)
    {
        try {
            Comment::where('post_id', $id)->delete();
            Post::destroy($id);

            return 'success';
        } catch(ModelNotFoundException $e) {
            return 'fail';
        }
    }

    public function managePost($id)
    {
        try {
            $post = Post::findOrFail($id);
            $comments = Comment::with('user')->where('post_id', $id)->orderBy('id', 'desc')->get();
            $categories = Category::all();

            return view('user-features.manage-post', [
                'post' => $post,
                'comments' => $comments,
                'categories' => $categories
            ]);
        } catch(ModelNotFoundException $e) {
            abort(404);
        }
    }

    public function createPost()
    {
        $categories = Category::all();

        return view('user-features.create-post', compact('categories'));
    }

    public function savePost(Request $request)
    {
        if ($request->file('thumbnail') != null) {
            $image = 'data:image/png;base64, ' . base64_encode(file_get_contents($request->file('thumbnail')));
            $post = Post::create([
                'title' => $request->title,
                'sumary' => $request->sumary,
                'content' => $request->content,
                'thumbnail' => $image,
                'slug' => Str::slug($request->title, '-'),
                'user_id' => Auth::id(),
                'sub_category_id' => $request->sub_category_id
            ]);

            return $post->id;
        }

        return 'fail';
    }

    public function updatePost(Request $request)
    {
        $post = Post::find($request->id);
        if ($request->file('thumbnail') != null) {
            $image = 'data:image/png;base64, ' . base64_encode(file_get_contents($request->file('thumbnail')));
            $post->update([
                'thumbnail' => $image
            ]);
        }
        $post->update([
            'title' => $request->title,
            'sumary' => $request->sumary,
            'content' => $request->content,
            'slug' => Str::slug($request->title, '-'),
            'sub_category_id' => $request->sub_category_id
        ]);

        return 'success';
    }

    public function checkSlug(Request $request)
    {
        $slug = trim($request->slug);
        $post = Post::where('slug', '=', $slug)->first();
        if ($post == null) {
            return 'available';
        } else {
            return 'duplicate';
        }
    }

    public function getSubcategories(Request $request)
    {
        $category_id = trim($request->category_id);
        $subCategories = SubCategory::where('category_id', '=', $category_id)->get();

        return $subCategories;
    }
}
