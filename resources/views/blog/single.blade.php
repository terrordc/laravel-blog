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
    <div class="col-md-10 m-auto">
<h3>Leave a comment</h3>
</div>
</div>
@can('create', App\Models\Comment::class)

<div class="row">

    <div class="comment-form col-md-8 offset-md-2">
        
        {{-- can банка --}}

<form method="POST" action="{{ route('commentsw.store', $post->id) }}" data-parsley-validate>


    <div class="form-group">
      <label for="comment" class="mb-2 h5"> {{auth()->user()->name}}</label>
<div class="input-group mb-3">
    <input type="text" class="form-control" name="comment" id="comment" placeholder="Comment" required minlength="5">
    <input class="btn btn-outline-secondary" type="submit" value="Submit"></input>
  </div>
  
          <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>
</div>
</div>

@endcan
<div class="row">
    <div class="comments col-md-10 m-auto">
        <h4>Comments</h4>
      
            @foreach($post->comments as $comment)
            <div class="comment border rounded card mt-3" id="{{$comment->id}}">
                <h5 class="card-header">{{$comment->user->name}}</h5>
                <div id="appendhere-{{$comment->id}}"></div>

                    <div id="comment-body-{{$comment->id}}">
                <div class="p-3 pb-0" > {{$comment->comment}}</div>
                <span class="text-muted p-3 pt-0 pb-0 mb-2">{{$comment->updated_at}}</span>
                <div class="row p-3">
                    
                        @can('delete', $comment)
                        <div class="col-md-6">
                        <form method="POST" action="{{ route('comments.destroy', $comment->id) }}"  class=" ">
                            <input type="submit" value="Delete" class="btn btn-danger btn-block">
                            @csrf
                        {{ method_field('DELETE') }}
                        </form> 
                        </div>
                        @endcan

                        @can('update', $comment)
                        <div class="col-md-6">
                        <button class="btn btn-success btn-block" id="edit-{{$comment->id}}-button" onclick="showEditForm(id)">Edit</button>
                        </div>
                        @endcan
                    </div>
                </div>
    </div>

    @endforeach

        {{-- <div class="comment border rounded card  mt-3">
            <h5 class="card-header">{{$comment->user->name}}</h5>
            <div class="p-3 pb-0"> {{$comment->comment}}</div>

            
            <div class="row justify-content-between align-items-center">
                <div class="col-md-4 pb-2">
                <span class="text-muted p-3 pt-0 pb-0">{{$comment->updated_at}}</span>


                </div>

                <div class="col-md-auto p-3 pb-1">
                    @can('delete', $comment)
                    <form method="POST" action="{{ route('comments.destroy', $comment->id) }}"  class="d-inline-flex ms-3  p-0">
                        <input type="submit" value="Delete" class="btn btn-danger ">
                        @csrf
                       {{ method_field('DELETE') }}
                    </form>
                    @endcan
                    @can('update', $comment)
                    <button class="btn btn-success" id="edit-button" onclick="showEditForm(id)">Edit</button>
                     <form method="POST" action="{{ route('comments.update', $post->id) }}" class="d-inline-flex ms-3  p-0">
                        <button type="submit" value="Edit" class="btn btn-primary me-3 mb-1 d-none "id="commit-edit">Save</button>
                        @csrf
                        {{ method_field('PUT') }}
                      </form> 

               @endcan


                </div>
            </div>
            

        </div>
         --}}


        {{-- <div class="comment border rounded card mt-3" id="{{$comment->id}}">
            <h5 class="card-header">{{$comment->user->name}}</h5>
            <form method="POST" action="{{ route('comments.update', $comment->id) }}">
                
            <div class="form-group p-3">
                <label for="comment">Comment:</label>
                <textarea type="text" class="form-control input-lg" id="comment" name="comment" rows="10">{{ $comment->comment }}</textarea>
              </div>

            <div class="row p-3">
                
                    @can('update', $comment)
                    <div class="col-md-6">
                        <button class="btn btn-danger btn-block" id="back-{{$comment->id}}-button" onclick="showComment(id)">Cancel</button>
                    </div>

                    <div class="col-md-6">
                    <input class="btn btn-success btn-block" id="edit-{{$comment->id}}-button" type="submit" value="Edit">
                    </div>
                    @endcan
                </div>
                {{ method_field('PUT') }}
                @csrf
            </form>

</div> --}}





    </div>

{{-- {{dd($comments)}} --}}
@endsection

@section('scripts')
<script src="../js/single.js"></script>
<script src="../js/parsley.min.js"></script>
@endsection