<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Session;
use Illuminate\Support\Facades\Validator;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        // sort dy?
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|min:5|max:255',
            // 'slug' => 'required|alpha_dash|min:5|max:255',
            // validate that after
            'body' => 'required',
        ]);
        $post = new Post;
        $post->title = $request->title;
        // if slug field is null pull from title
        if($request->slug == null){

                       $new_slug  = \Illuminate\Support\Str::slug($request->input('title'), '-');
              
                    // check if slug already exists
                     if(Post::where('slug' ,'=', $new_slug)->exists()){
                        // throw error
                        
                     }
                     else{
                        // update with newly created slug
                        $post->slug = $new_slug;
                    }

             
        }
        // else validate slug and push to database
        else{
            $request->validate([
                'slug' => 'alpha_dash|min:5|max:255|unique:posts,slug'
        ]);
        $post->slug = $request->slug;
        }

        $post->body = $request->body;

        $post->save();
        Session::flash('success', 'Post successfully created!'); 
      return redirect()->route('posts.show', $post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit')->withPost($post);
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


        
        $validated = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'body' => 'required',
        ]);

        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->slug = $request->input('slug');

        $post->save();

    
        Session::flash('success', 'Post successfully updated!'); 
      return redirect()->route('posts.show', $post->id);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', 'Post successfully deleted!'); 

      return redirect()->route('posts.index');

    }
}
