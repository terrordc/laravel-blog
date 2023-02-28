@extends('main')

@section('title', '| All Posts')

@section('content')
<div class="row">
    <div class="col-md-10 m-auto">
        
<h1 class="mt-2">All Posts</h1>
<hr>
<div class="row">
    <div class="col-md-12 m-auto">
<table class="table table-sm table-hover" style="width:100%">
                <thead class="table-dark">
                    <th>#</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Created At</th>
                    <th></th>
                </thead>

                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <th>{{$post->id}}</th>
                        <td>
                          
                           {{ \Illuminate\Support\Str::limit($post->title, 127, '...')}}
                        </td>
                        <td>
                            {{ \Illuminate\Support\Str::limit($post->body, 255, '...')}}
                        </td>
                        <td>{{date('j F, Y, G:i ', strtotime($post->created_at))}}</td>
                        <td style="width:12%; text-align:center;">
                            <a href="{{ route('posts.show' , $post->id)}}" class="btn btn-default btn-sm border d-block m-auto mb-1">View</a>
                            <a href="{{ route('posts.edit' , $post->id)}}" class="btn btn-default btn-sm border d-block m-auto mt-1">Edit</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>


            <div class="text-center m-auto d-flex justify-content-center">
                {!! $posts->links(); !!}
            </div>
    </div>  
    </div>
</div>  
</div>
@endsection