<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Session;
class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Comment::class);

        $comments = Comment::orderBy('id', 'desc')->paginate(10);
       
        return view('comments.index')->withComments($comments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            //admin func
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
        $this->authorize('create', Comment::class);

        $validated = $request->validate([
            'comment' => 'required|min:5|max:2000',
        ]);

        $post = Post::find($post_id);
        
        $comment = new Comment;

        // $this->authorize('create', Comment::class);

        $comment->comment = $request->input('comment');
        $comment->post()->associate($post);
        $comment->user_id = auth()->id();
        $comment->approved = true;
        $comment->likes = 0;

        $comment->save();
        Session::flash('success', 'Comment successfully created!'); 
      return redirect()->route('blog.single', $post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //go to post containing comment, select it? url magic
        $comment = Comment::find($id);
        $this->authorize('view', $comment);
        $user = User::find($comment->user_id);


        return view('comments.show')->withComment($comment);
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
        $validated = $request->validate([
            'comment' => 'required|min:5|max:2000',
        ]);
        $comment = Comment::find($id);
        $this->authorize('update', $comment);

        $slug = $comment->post->slug;
        $comment->comment = $request->input('comment');
       
        $comment->save();
        Session::flash('success', 'Comment successfully updated!'); 
        return redirect()->route('blog.single', $slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $slug = $comment->post->slug;
        $this->authorize('delete', $comment);
        $comment->delete();

        Session::flash('success', 'Comment successfully deleted!'); 

      return redirect()->route('blog.single', $slug);

    }
}
