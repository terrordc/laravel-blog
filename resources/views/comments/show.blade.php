@extends('main')

@section('title', '| View Comment')

@section('content')
<div class="row mt-4">
    <div class="col-md-8">

      

<p class="lead">{{$comment->comment}}</p>
</div>
<div class="col-md-4">
    <div class="card">
    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Url:</dt>
            
            <dd><a href="{{ route('blog.single', $comment->post->slug) }}">{{route('blog.single', $comment->post->slug)}}</a> </dd>
        </dl>
         <dl class="dl-horizontal">
        <dt>Created at:</dt>
        <dd>{{date('j F, Y, G:i ', strtotime($comment->created_at))}}</dd>
    </dl>
    <dl class="dl-horizontal">
        <dt>Updated at:</dt>
        <dd>{{date('j F, Y, G:i ', strtotime($comment->updated_at))}}</dd>
    </dl>

   
    <dl class="dl-horizontal">
        <dt>Created by:</dt>
        <dd>{{$comment->user->name}}</dd>
    </dl>
    

    <dl class="dl-horizontal">
        <dt>Email:</dt>
        <dd>{{$comment->user->email}}</dd>
    </dl>


    <hr>

    <div class="row justify-content-evenly">

            <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-primary btn-block mt-2 col-5">Edit</a>


            <form method="POST" action="{{ route('comments.destroy', $comment->id) }}" class=" mt-2 col-5 p-0">
                <input type="submit" value="Delete" class="btn btn-danger btn-block w-100">
                @csrf
               {{ method_field('DELETE') }}
            </form>

    </div>
 <a href="{{ route('comments.index') }}" class="btn btn-Light btn-block border mt-2  w-100">Back to all posts</a>

        </div>
    </div>
</div>

</div>
@endsection