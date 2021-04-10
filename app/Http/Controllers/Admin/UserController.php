<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Kreait\Firebase\Factory;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role_id', 1)->orderBy('id', 'desc')->get();

        return view('admin.user', [
            'users' => $users
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
            User::destroy($id);

            return 'success';
        } catch (ModelNotFoundException $e) {
            return 'fail';
        }
    }

    public function recentUsers()
    {
        $recentUsers = User::where('role_id', '1')->orderBy('id', 'desc')->limit(6)->get();

        return response()->json([
            'recentUsers' => $recentUsers
        ], 200);
    }

    public function changeMostRecentUser()
    {
        $factory = (new Factory())->withDatabaseUri('https://uet-news-2021-default-rtdb.firebaseio.com/');

        $database = $factory->createDatabase();
        // $reference = $database->getReference('recentUsers')->orderByKey()->limitToFirst(1)->getSnapshot();
        // $value = $reference->getValue();
        // echo "<pre>";
        // print_r($value);
        // echo "</pre>";
        
        // $recentUsers = User::where('role_id', '1')->orderBy('id', 'desc')->limit(6)->get();
        // foreach ($recentUsers as $value) {
        //     echo "<pre>";
        //     print_r('ID: '.$value->id.' - Name: '.$value->name);
        //     echo "</pre>";
        // }
        // $array = [];
        // foreach ($recentUsers as $recentUser) {
        //     $array[] = $recentUser->id;
        // }
        // $removeId =  Arr::last($array);
        // $newId = 54;
        // $update = [
        //     'recentUsers/'.$removeId => 'Katelyn Schusterr'
        // ];
        // $database->getReference()->update($update);
        // $database->getReference('recentUsers/54')->remove();
        // $database->getReference('recentUsers')->update([
        //     41 => 'Katelyn Schusterr'
        // ]);
        // $database->getReference('recentClientActivities')->push([
        //     'activity' => 'Change Nameeeeeeee',
        //     'description' => 'Katelyn Schusterr change account\'s password',
        //     'time' => Carbon::now()->toDateTimeString()
        // ]);
        // echo "<pre>";
        // print_r($removeId);
        // echo "</pre>";
        
        
        $posts = Post::all();
        foreach ($posts as $post) {
            foreach($post->comments as $comment) {
                $database->getReference('comments/' . $post->id)->push([
                    'comment' => $comment->content,
                    'user' => $comment->user->name,
                    'time' => $comment->created_at->toDateTimeString(),
                    'mysql_id' => $comment->id
                ]);
            }
        }
    }
}
