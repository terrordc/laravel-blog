<?php

namespace App\Http\Controllers;
use App\Models\Post;
class PagesController extends Controller
{
    public function getIndex(){
        $posts = Post::orderBy('created_at', 'desc')->paginate(4);

        return view('pages/welcome')->withPosts($posts);
    }
    public function getAbout(){
        return view('pages/about');
    }
}
