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

    <div class="row justify-content-between">

            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-block mt-2 col-5 ms-3">Edit</a>


            <form method="POST" action="{{ route('users.destroy', $user->id) }}" class=" mt-2 col-5 p-0 me-3">
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
    
        @foreach($user_posts = $user->posts()->paginate(3) as $post)
        <div class="row mt-4 ">
            <div class="col-md-11 m-auto border rounded p-4">
                <h5>{{ \Illuminate\Support\Str::limit($post->body, 99, '...')}}</h5>
                <p>{{ \Illuminate\Support\Str::limit($post->body, 255, '...')}}</p>
                <div class="row align-items-center">
                <span class="text-muted col-8">{{date('j F, Y, G:i ', strtotime($post->updated_at))}}</span>
                <div class="row col-4 justify-content-between">
                    <form method="POST" action="{{ route('posts.destroy', $post->id) }}" class=" mt-2 col-5 me-2">
                        <input type="submit" value="Delete post" class="btn btn-danger ">
                        @csrf
                       {{ method_field('DELETE') }}
                    </form>
                 

                 <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary col-5 mt-2 ms-2">Go to post</a>
                </div>
            </div>
            </div>
        </div>
        @endforeach
        <div class="mt-4">
        {!! $user_posts->links(); !!}
    </div>
    </div>
</div>


<div class="m-auto">
    <div class="row mt-4 ">
        <div class="col-md-10  border rounded p-4 m-auto">
            <h3>Recent comments:</h3>
            @foreach($user_comments = $user->comments()->paginate(3) as $comment)
            <div class="row mt-4 ">
                <div class="col-md-11 m-auto border rounded p-4">
                    <h5>User: {{$comment->user->name}}</h5>
                    <p>Said: {{ \Illuminate\Support\Str::limit($comment->comment, 255, '...')}}</p>
                    <div class="row align-items-center">
                       
                        <span class="text-muted col-3">{{date('j F, Y, G:i ', strtotime($comment->updated_at))}}</span>
                        <div class="row col-9 justify-content-end">
                        
                        {{-- diff method? --}}
    
                        <form method="POST" action="{{ route('comments.destroy', $comment->id) }}" class=" col-6 ">
                            <input type="submit" value="Delete comment" class="btn btn-danger w-100">
                            @csrf
                           {{ method_field('DELETE') }}
                        </form>
    
                        <a href="{{ route('blog.single', $comment->post->slug) }}" class="btn btn-primary col-4">Go to post</a>
                    </div>
                </div>
                </div>
            </div>
            @endforeach
            <div class="mt-4">
            {!! $user_comments->links(); !!}
        </div>
        </div>
    </div>
</div>
@endsection