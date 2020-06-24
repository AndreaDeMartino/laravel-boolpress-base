<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    function index(){
        // $posts = Post::all();

        // Paginazione Post
        $posts = Post::simplePaginate(2);

        return view('static-pages.posts',compact('posts'));
    }

}
