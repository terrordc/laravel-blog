<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Comment;
class BlogController extends Controller
{
    public function getSingle($slug){
   
       $post = Post::where('slug', '=' , $slug)->firstOrFail();
       $comments = Comment::where('post_id','=', $post->id);
       return view('blog.single')->withPost($post)->withComments($comments);
    }

    public function getIndex(){
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('blog.index')->withPosts($posts);
     }
}
