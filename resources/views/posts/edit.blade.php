@extends('main')

@section('title', '| Edit post')

@section('content')
<div class="row mt-4">
    <div class="col-md-8">

        <form method="POST" action="{{ route('posts.update', $post->id) }}">
            <div class="form-group">
              <label for="title">Title:</label>
              <textarea type="text" class="form-control input-lg" id="title" name="title" rows="1" style="resize:none;">{{ $post->title }}</textarea>
            </div>
            <div class="form-group">
              <label for="body">Body:</label>
              <textarea type="text" class="form-control input-lg" id="body" name="body" rows="10">{{ $post->body }}</textarea>
            </div>
          </div>
          
<div class="col-md-4 mt-4">
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

    <div class="row justify-content-between m-0">
        
            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-danger btn-block mt-2 col-5 ">Cancel</a>
       
            <button type="submit" class="btn btn-primary btn-block mt-2 col-5">Save</button>
            @csrf
            {{ method_field('PUT') }}
          </form>
    </div>

    <a href="{{ route('posts.index') }}" class="btn btn-Light btn-block border mt-2  w-100">Back to all posts</a>

        </div>
    </div>
</div>

</div>
                  </form>
                </div>
{{-- 
      
<h1>{{ $post->title}}</h1>

<p class="lead">{{$post->body}}</p> --}}

@endsection