@extends('main')

@section('title' , '| ' . htmlspecialchars($post->title))


@section('content')

<div class="row m-auto">
    <div class="col-md-10 m-auto ">
        <h1 class="mt-3">{{ $post->title}}</h1>
        <p class="mt-2">{{$post->body}}</p>
    </div>
</div>
@endsection