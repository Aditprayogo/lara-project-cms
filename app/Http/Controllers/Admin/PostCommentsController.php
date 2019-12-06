<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Post;
use App\Comment;
use Auth;

class PostCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::paginate(4);

        $posts = Post::all();

        return view('admin.comments.index', compact('comments' , 'posts'));
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
        
        $user = Auth::user();

        $this->validate($request, [

            'body' => 'required'
            
        ]);

        $data = [

            'post_id' => $request->input('post_id'),
            'user_id' => $user->id,
            'author' => $user->name,
            'email' => $user->email,
            'body' => $request->input('body'),
            'photo' => $user->photo->file
            
        ];   

        Comment::create($data);

        return redirect()->back()->with('success', 'The comment has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post = Post::findOrFail($id);

        // $comments = Comment::paginate(10);

        // Urutkan comment berdasarkan spesific post id
        $comments = $post->comments;

        return view('admin.comments.show', compact('comments' , 'post'));

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
        $comment = Comment::findOrFail($id);

        $input = $request->all();

        $comment->update($input);

        return redirect()->back()->with('success', 'The Comment has been Edited');

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
        Comment::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Comment has been deleted');

    }

    public function deleteComments(Request $request)
    {
        # code...
        $comments = Comment::findOrFail($request->checkBoxArray);

        foreach ($comments as $comment) {

            # code...
            $comment->delete();
        }

        return redirect()->back()->with('success', 'The Comment has been deleted');
    }
}
