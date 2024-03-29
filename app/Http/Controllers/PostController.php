<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
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
        $this->authorize('viewAny', Post::class);

        $posts = Post::orderBy('id', 'desc')->paginate(10);
        // return poster name
        $users = [];
        foreach($posts as $post){
          
           $user = User::find($post->user_id);
           $post->name = $user->name;
           $post->email = $user->email;
        }
        
        return view('posts.index')->withPosts($posts);
        // ->withUsers($users)
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $this->authorize('create', Post::class);
        $categories = Category::all();
        return view('posts.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $this->authorize('create', Post::class);

        $validated = $request->validate([
            'title' => 'required|min:5|max:255',
            'body' => 'required',
            'category_id' => 'required|integer',
        ]);
       
         //    if slug field is null
        if($request->slug == null){
                // create slug from title
                $new_slug  = \Illuminate\Support\Str::slug($request->input('title'), '-');
        
                // check if slug from title already exists and redirect with error
                if(Post::where('slug' ,'=', $new_slug)->exists()){
                    $errors = ['error' => 'Slug already occupied!'];
                    return redirect()->route('posts.create')->withErrors($errors);
                }
                else{
                //if not update request with slug from title and verify
                $request->request->add(['slug' => $new_slug]);   
                $request->validate([
                    'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug'
                    ]);

                    //save
                $post->slug = $new_slug;
                }
        }
        // else validate slug and push to database
        else{
                 
            $request->validate([
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug'
                ]);
            $post->slug = $request->input('slug');
                }
    // update everything else and save
        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category_id;
        $post->user_id = auth()->id();
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
        $this->authorize('view', $post);
        $user = User::find($post->user_id);
        $post->name = $user->name;
        $post->email = $user->email;
        // $comments = Comment::whereBelongsTo($post)->orderBy('id', 'desc')->paginate(3);

        return view('posts.show')->withPost($post);
        // ->withComments($comments)
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        // $this->authorize('edit', $id);
//ADD KAZANTSEVA

        $post = Post::find($id);
        $this->authorize('update', $post);

        $user = User::find($post->user_id);
        $post->name = $user->name;
        $post->email = $user->email;
        $categories = Category::all();
        return view('posts.edit')->withPost($post)->withCategories($categories);
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
        $post = Post::find($id);
        $this->authorize('update', $post);
        // slug hasnt changed - skip to save
        if($request->input('slug') == $post->slug){
            $validated = $request->validate([
                'title' => 'required|max:255',
                'body' => 'required',
                'category_id' => 'required|integer',
            ]);
        }

        // slug did change - 
        else{
        //    if slug field is null
                if($request->input('slug') == null){
                    // create slug from title
                    $new_slug  = \Illuminate\Support\Str::slug($request->input('title'), '-');

                    // check if slug from title already exists and redirect with error
                    if(Post::where('slug' ,'=', $new_slug)->exists()){
                        $errors = ['error' => 'Slug from title already occupied!'];
                        return redirect()->route('posts.edit', $post->id)->withErrors($errors);
                    }
                    //if not update request with slug from title and verify
                    else{
                        $request->request->add(['slug' => $new_slug]);   
                        $request->validate([
                            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug'
                            ]);

                            //save
                        $post->slug = $new_slug;
                    }
                }
        // if slug field isnt null validate and update database
                else{
                 
                $request->validate([
                    'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug'
                    ]);
                $post->slug = $request->input('slug');
                    }
        }
        // update everything else and save
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->category_id = $request->category_id;
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
        $this->authorize('delete', $post);
        $post->delete();

        Session::flash('success', 'Post successfully deleted!'); 

      return redirect()->route('posts.index');

    }
}
