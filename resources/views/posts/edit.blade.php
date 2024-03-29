@extends('main')

@section('title', '| Edit post')

@section('content')
<div class="row mt-4">
    <div class="col-md-8">

        <form method="POST" action="{{ route('posts.update', $post->id) }}">
            <div class="form-group">
              <label for="title">Title:</label>
              <textarea type="text" class="form-control" id="title" name="title" rows="1" style="resize:none;">{{ $post->title }}</textarea>
            </div>
            <div class="form-group">
                <label for="slug"> Slug:</label>
                <textarea class="form-control" name="slug" id="slug" rows="1" style="resize:none; " >{{ $post->slug }}</textarea>
                <p class="text-muted mb-1 mt-1">If left null, slug is taken from title</p>

                <label for="category_id"> Category:</label>
                <select class="form-control" name="category_id" id="category_id" value="{{$post->category->id}}">
                    @foreach($categories as $category)
                    @if($category->id == $post->category->id)
                    <option value="{{$category->id}}" selected>{{$category->name}}</option>
                    @else
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endif
                    
            
                    @endforeach
                  </select>

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
            <dt>Url slug:</dt>
            <dd><a href="{{url($post->slug)}}">{{url($post->slug)}}</a> </dd>
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