@extends('main')

@section('title', '| View User')

@section('content')
<div class="row mt-4 ">


<div class="col-md-10 m-auto p-0">
    <div class="card">
    <div class="card-body p-4">
      
            <h5>User: {{$user->name}}</h5>
           <hr>
           <div class="row">
            <div class="col fw-bold">Role:</div>
            <div class="col">{{$user->role_id}} </div>
        </div>
<div class="row">
    <div class="col fw-bold">Email:</div>
    <div class="col">{{$user->email}}</div>
</div>
<div class="row">
    <div class="col fw-bold">Created at:</div>
    <div class="col">{{date('j F, Y, G:i ', strtotime($user->created_at))}}</div>
</div>
<div class="row">
    <div class="col fw-bold">Updated at:</div>
    <div class="col">{{date('j F, Y, G:i ', strtotime($user->updated_at))}}</div>
</div>




    <hr>

    <div class="row justify-content-around">

            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-block mt-2 col-5">Edit</a>


            <form method="POST" action="{{ route('users.destroy', $user->id) }}" class=" mt-2 col-5 p-0">
                <input type="submit" value="Delete" class="btn btn-danger btn-block w-100">
                @csrf
               {{ method_field('DELETE') }}
            </form>

    </div>
 <a href="{{ route('users.index') }}" class="btn btn-Light btn-block border mt-2  w-100">Back to all users</a>

        </div>
    </div>
</div>



</div>

<div class="row mt-4 ">
    <div class="col-md-10 m-auto border rounded p-4">
        <h3>Recent posts by user:</h3>
    
        @foreach($posts as $post)
        <div class="row mt-4 ">
            <div class="col-md-11 m-auto border rounded p-4">
                <h5>{{ \Illuminate\Support\Str::limit($post->body, 99, '...')}}</h5>
                <p>{{ \Illuminate\Support\Str::limit($post->body, 255, '...')}}</p>
                <div class="row align-items-center">
                <span class="text-muted col-8">{{date('j F, Y, G:i ', strtotime($post->updated_at))}}</span>
                <div class="row col-4 justify-content-between">
                 <a href="{{ route('posts.destroy', $post->id) }}" class="btn btn-danger col-5 mt-2 me-2">Delete post</a>
                 <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary col-5 mt-2 ms-2">Go to post</a>
                </div>
            </div>
            </div>
        </div>
        @endforeach
        <div class="mt-4">
        {!! $posts->links(); !!}
    </div>
    </div>
</div>


<div class="row mt-4 ">
    <div class="col-md-10  m-auto border rounded p-4">
        <h3>Recent comments by user:</h3>
        @foreach($comments as $comment)
        <div class="row mt-4 ">
            <div class="col-md-11 m-auto border rounded p-4">
                <h5>On post: {{$comment->post->title}}</h5>
                <p>Said: {{ \Illuminate\Support\Str::limit($comment->comment, 255, '...')}}</p>
                <div class="row align-items-center">
                   
                    <span class="text-muted col-7">{{date('j F, Y, G:i ', strtotime($comment->updated_at))}}</span>
                    <div class="row col-5 justify-content-between">
                    <a href="{{ route('comments.destroy', $comment->id) }}" class="btn btn-danger col-5 mt-2 me-2">Delete comment</a>
                    <a href="{{ route('blog.single', $comment->post->slug) }}" class="btn btn-primary col-5 mt-2 ms-2">Go to post</a>
                </div>
            </div>
            </div>
        </div>
        @endforeach
        <div class="mt-4">
        {!! $comments->links(); !!}
    </div>
    </div>
</div>
@endsection