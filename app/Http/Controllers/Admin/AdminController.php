<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Post;
use App\Comment;
use App\Category;
use App\CommentReply;

class AdminController extends Controller
{
    //
    public function index()
    {
        # code...
        $postsCount = Post::count();
        $categoriesCount = Category::count();
        $commentsCount = Comment::count();
        $repliesCount = CommentReply::count();

        return view('admin/index', compact('postsCount', 'categoriesCount', 'commentsCount', 'repliesCount'));
    }

    public function profile()
    {
        # code...
        return view('admin/profile');
    }
}
