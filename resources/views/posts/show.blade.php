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
            <dt>Url slug:</dt>
            
            <dd><a href="{{url('blog', $post->slug) }}">{{route('blog.single', $post->slug)}}</a> </dd>
        </dl>
         <dl class="dl-horizontal">
        <dt>Created at:</dt>
        <dd>{{date('j F, Y, G:i ', strtotime($post->created_at))}}</dd>
    </dl>
    <dl class="dl-horizontal">
        <dt>Created at:</dt>
        <dd>{{date('j F, Y, G:i ', strtotime($post->updated_at))}}</dd>
    </dl>

   
    <dl class="dl-horizontal">
        <dt>Created by:</dt>
        <dd>{{$post->name}}</dd>
    </dl>
    
    @can('viewSexy', App\Models\Post::class)
    <dl class="dl-horizontal">
        <dt>Email:</dt>
        <dd>{{$post->email}}</dd>
    </dl>
    @endcan
    @include('partials\_category')
    <hr>

    <div class="row justify-content-between">
        @can('delete', $post)
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-block mt-2 col-5 ms-3">Edit</a>
       
            @can('edit', $post)
            @endcan

            <form method="POST" action="{{ route('posts.destroy', $post->id) }}" class=" mt-2 col-5 p-0 me-3">
                <input type="submit" value="Delete" class="btn btn-danger btn-block w-100">
                @csrf
               {{ method_field('DELETE') }}
            </form>
            @endcan
    </div>
 <a href="{{ route('posts.index') }}" class="btn btn-Light btn-block border mt-2  w-100">Back to all posts</a>



        </div>
    </div>
</div>

</div>

@include('partials\_post_comment_last3')

@endsection