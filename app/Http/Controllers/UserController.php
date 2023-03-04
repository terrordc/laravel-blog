<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Hash;
use Session;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', User::class);

        $users = User::orderBy('id', 'desc')->paginate(10);
       
        return view('users.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', User::class);
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', User::class);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' =>'unique:users,email|required|email:rfc,dns',
            'role_id' => 'required|between:1,3',
            'password' =>'min:8',
            'repeat-password' =>'min:8|same:password',
        ]);
        

        
        $user = new User;

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role_id = $request->input('role_id');


        $user->save();
        Session::flash('success', 'User successfully created!'); 
      return redirect()->route('users.show', $user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

                $user = User::find($id);
                $this->authorize('view', $user);
                
                $posts = Post::whereBelongsTo($user)->orderBy('id', 'desc')->paginate(3);//paginate
                $comments = Comment::whereBelongsTo($user)->orderBy('id', 'desc')->paginate(3);
                
            //    dd($comments);
                return view('users.show')->withUser($user)->withPosts($posts)->withComments($comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $this->authorize('update', $user);

       
        return view('users.edit')->withUser($user);
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
        $user = User::find($id);
        $this->authorize('update', $user);
        if($request->input('email') == $user->email){
        $validated = $request->validate([
            'name' => 'required|max:255',
            
            'role_id' => 'required|between:1,3',
            'password' => 'min:8',
        ]);
       
    }
            else{
                $validated = $request->validate([
                'email' => 'unique:users,email|required|email:rfc,dns',
            ]);
            }

            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->role_id = $request->input('role_id');
            $user->password =  Hash::make($request->password);
           
            


        $user->save();
        Session::flash('success', 'User successfully updated!'); 
        return redirect()->route('users.show', $id);
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
    }
}
