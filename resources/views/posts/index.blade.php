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
                    <th>Name</th>
                    @can('viewSexy', App\Models\Post::class)
                    <th>Email</th>
                    @endcan
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
                        <td>
                            {{ $post->name}}
                        </td>
                        @can('viewSexy', App\Models\Post::class)
                        <td>
                            {{ $post->email}}
                        </td>
                        @endcan
                        <td>{{date('j F, Y, G:i ', strtotime($post->created_at))}}</td>
                        <td style="width:12%; text-align:center;">
                            <a href="{{ route('posts.show' , $post->id)}}" class="btn btn-primary btn-sm border d-block m-auto mb-1">View</a>
                            @can('update', $post)
                            <a href="{{ route('posts.edit' , $post->id)}}" class="btn btn-success btn-sm border d-block m-auto mt-1">Edit</a>
                            @endcan
                            @can('delete', $post)
                            <form method="POST" action="{{ route('posts.destroy', $post->id) }}" class=" p-0"  >
                                <input type="submit" value="Delete" class="btn btn-danger d-block btn-sm border mt-1">
                                @csrf
                               {{ method_field('DELETE') }}
                            </form>
                            @endcan
                            

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