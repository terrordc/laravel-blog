@extends('main')

@section('title', '| Blog')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1 class="mb-4 mt-2">Blog</h1>
    </div>
</div>

    
@foreach($posts as $post)

    <div class="col-md-10 col-md-offset-2 text-bg-light rounded-3 border mb-3 p-4">
        <h2>{{$post->title}}</h2>
        <h5>Published: {{date('j F, Y, G:i ', strtotime($post->created_at))}}</h5>
        <p> {{ \Illuminate\Support\Str::limit($post->body, 255, '...')}}</p>

        <a class="btn btn-primary" href="{{ route('blog.single' , $post->slug)}}">Read More</a>
    </div>

@endforeach
<div class="text-center m-auto d-flex justify-content-center">
    {!! $posts->links(); !!}
</div>
@endsection