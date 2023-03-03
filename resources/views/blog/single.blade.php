@extends('main')

@section('title' , '| ' . htmlspecialchars($post->title))

@section('stylesheets')
<link rel="stylesheet" href="../css/parsley.css">
@endsection

@section('content')

<div class="row m-auto">
    <div class="col-md-10 m-auto ">
        <h1 class="mt-3">{{ $post->title}}</h1>
        <p class="mt-2">{{$post->body}}</p>
    </div>
</div>
<hr>

<div class="row">
    <div class="comment-form col-md-8 offset-md-2">
        <h3>Leave a comment</h3>
        {{-- can банка --}}
<form method="POST" action="{{ route('commentsw.store', $post->id) }}" data-parsley-validate>


    <div class="form-group">
      <label for="comment"> name</label>
<div class="input-group mb-3">
    <input type="text" class="form-control" name="comment" id="comment" placeholder="Comment" required minlength="5">
    <input class="btn btn-outline-secondary" type="submit" value="Submit"></input>
  </div>
  
          <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>
</div>
</div>
<div class="row">
    <div class="comments col-md-9 offset-md-2">
        <h4>Comments</h4>
      
        @foreach($post->comments as $comment)
      
        <div class="comment border rounded p-3 mt-3">
            <h5>{{$comment->user->name}}</h5>
            <p> {{$comment->comment}}</p>
        </div>
        @endforeach
        
    </div>
</div>



</div>
{{-- {{dd($comments)}} --}}
@endsection

@section('scripts')
<script src="../js/parsley.min.js"></script>
@endsection