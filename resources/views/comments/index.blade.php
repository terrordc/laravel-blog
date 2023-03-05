@extends('main')

@section('title', '| All Comments')

@section('content')
<div class="row">
    <div class="col-md-10 m-auto">
        
<h1 class="mt-2">All Comments</h1>
<hr>
<div class="row">
    <div class="col-md-12 m-auto">
<table class="table table-sm table-hover" style="width:100%">
                <thead class="table-dark">
                    <th>#</th>
                    <th>Comment</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Approved</th>
                    <th>Likes</th>
                    <th>Created At</th>
                    <th></th>

                </thead>

                <tbody>
                    @foreach($comments as $comment)
                    
                    <tr>
                        
                        <th>{{$comment->id}}</th>
                        <td>{{ \Illuminate\Support\Str::limit($comment->comment, 255, '...')}}</td>
                        <td>{{$comment->user->name}}</td>
                        <td>{{$comment->user->email}}</td>
                        <td>{{$comment->approved}}</td>
                        <td>{{$comment->likes}}</td>
                        <td>{{date('j F, Y, G:i ', strtotime($comment->created_at))}}</td>
                        <td style="width:12%; text-align:center;">
                            
                            <a href="{{ route('posts.show' , $comment->post->id)}}#comment-body{{$comment->id}}" class="btn btn-primary btn-sm border d-block m-auto mb-1">View</a>

                            <a href="{{ route('comments.edit' , $comment->id)}}" class="btn btn-success btn-sm border d-block m-auto mt-1">Edit</a>
                            <form method="POST" action="{{ route('comments.destroy', $comment->id) }}" class=" p-0"  >
                                <input type="submit" value="Delete" class="btn btn-danger d-block btn-sm border mt-1 w-100">
                                @csrf
                               {{ method_field('DELETE') }}
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>


            <div class="text-center m-auto d-flex justify-content-center">
                {!! $comments->links(); !!}
            </div>
    </div>  
    </div>
</div>  
</div>


@endsection