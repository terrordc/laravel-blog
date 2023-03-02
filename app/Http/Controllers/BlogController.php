<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getSingle($slug){
       $post = Post::where('slug', '=' , $slug)->firstOrFail();
       return view('blog.single')->withPost($post);
    }

    public function getIndex(){
        $posts = Post::paginate(10);
        return view('blog.index')->withPosts($posts);
     }
}
