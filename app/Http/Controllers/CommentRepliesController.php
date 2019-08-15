<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comment;
use App\CommentReply;
use App\Post;
use App\User;
use Auth;

class CommentRepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user = Auth::user();

        $this->validate($request, [

            'body' => 'required'
            
        ]);

        $data = [

            'comment_id' => $request->input('comment_id'),
            'user_id' => $user->id,
            'author' => $user->name,
            'email' => $user->email,
            'body' => $request->input('body'),
            'photo' => $user->photo->file
            
        ];   

        CommentReply::create($data);

        return redirect()->back()->with('success', 'The comment has been created');
    }

    public function createReply(Request $request)
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
        $comment = Comment::findOrFail($id);

        // $replies = CommentReply::paginate(6);

        // display replies for spesific comments cara gampang
        $replies = $comment->replies;

        return view('admin.comments.replies.show', compact('comment', 'replies'));
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

        $reply = CommentReply::findOrFail($id);

        $this->validate($request, [
            'body' => 'required'
        ]);

        $input = $request->all();

        $reply->update($input);

        return redirect()->back()->with('success', 'The Reply has been edited');
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
        $reply = CommentReply::findOrFail($id);

        $reply->delete();

        return redirect()->back()->with('success', 'The Comment has been deleted');
    }
}
