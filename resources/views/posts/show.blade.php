@extends('main')

@section('title', '| View post')

@section('content')
<div class="row mt-4">
    <div class="col-md-8">
<h1>{{ $post->title}}</h1>

<p class="lead">{{$post->body}}</p>
</div>
<div class="col-md-4">
    <div class="card">
    <div class="card-body">
         <dl class="dl-horizontal">
        <dt>Created at:</dt>
        <dd>{{date('j F, Y, G:i ', strtotime($post->created_at))}}</dd>
    </dl>
    <dl class="dl-horizontal">
        <dt>Created at:</dt>
        <dd>{{date('j F, Y, G:i ', strtotime($post->updated_at))}}</dd>
    </dl>

    <hr>

    <div class="row justify-content-evenly">
        
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-block mt-2 col-5">Edit</a>
       
            <a href="{{ route('posts.destroy', $post->id) }}" class="btn btn-danger btn-block mt-2 col-5 ">Delete</a>
       
    </div>

        </div>
    </div>
</div>

</div>
@endsection