<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\Http\Requests\PostsCreateRequest;
use App\Http\Requests\AdminPostsEditRequest;
use App\Post;
use App\Photo;
use App\User;
use Auth;
use App\Category;
use App\Comment;
use App\CommentReply;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();

        $posts = Post::all();

        return view('admin.posts.index', compact('categories', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       

        $categories = Category::all();

        return view('admin.posts.create')->with('categories', $categories);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        //
        // $input = $request->all();

        // if ($file = $request->file('photo_id')) {
        //     # code...
        //     $name = time() . $file->getClientOriginalName();

        //     $file->move('images', $name);

        //     $photo = Photo::create(['file' => $name]);

        //     $input['photo_id'] = $photo->id;
        // }

        // $input['user_id'] = Auth::user()->id;

        // Post::create($input);
        

        //mngambil user yang sekarang login
        $user = Auth::user();

        $input = $request->all();

        if ($file = $request->file('photo_id')) {

            # code...
            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create( ['file' => $name] );

            $input['photo_id'] = $photo->id;

        }

        // //mendapatkan user yang sedang login
        // Auth::user()->posts()->create($input);

        $user->posts()->create($input);

        return redirect('/admin/posts')->with('success', 'The Post Has Been Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $user = User::findOrFail($id);

        $posts = $user->posts;

        return view('admin.posts.show', compact('user', 'posts'));
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
        $post = Post::findOrFail($id);

        $categories = Category::all();

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminPostsEditRequest $request, $id)
    {
        //

        // $post = Post::findOrFail($id);

        $input = $request->all();

        if ( $file = $request->file('photo_id') ) {
            # code...
            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;

        }

        //mendapatkan user yang sedang login
        Auth::user()->posts()->findOrFail($id)->update($input);

        // $post->update($input);

        return redirect('admin/posts')->with('success', 'The Post Has Been Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $post = Post::findOrFail($id);

        // unlink(public_path() . $post->photo->file);

        $post->delete();

        return redirect('admin/posts')->with('success', 'The Post Has been deleted');
    }

    public function post($id)
    {
        # code...

        $post = Post::findOrFail($id);

        $user = $post->user;

        $categories = Category::all();

        $comments = Comment::orderBy('created_at', 'desc')->get();

        $replies = CommentReply::orderBy('created_at', 'desc')->get();

        return view('post', compact( 'post', 'categories', 'comments', 'user', 'replies' ));
        
    }
}
