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
                            @if( strlen($post->title) > 180)
                            {{implode(' ', array_slice(explode(' ', substr($post->title, 0, 180)), 0, 21)) . '...'}}
                            @endif
                            @if(strlen($post->title) < 180)
                            {{implode(' ', array_slice(explode(' ', substr($post->title, 0, 180)), 0, 21)) }}
                            @endif
                        </td>
                        <td>
                            @if( strlen($post->body) > 192)
                            {{implode(' ', array_slice(explode(' ', substr($post->body, 0,  192)), 0, 33)) . '...'}}
                            @endif
                            @if(strlen($post->body) <  192)
                            {{implode(' ', array_slice(explode(' ', substr($post->body, 0,  192)), 0, 33)) }}
                            @endif
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


        {{-- @foreach ($posts as $post)

        <div class="col-9 h-100 m-auto">
            <div class="post p-4 text-bg-light rounded-3 mt-4">
                <h3 class="text-break">
                 
                    @if( strlen($post->title) > 180)
                    {{implode(' ', array_slice(explode(' ', substr($post->title, 0, 180)), 0, 21)) . '...'}}
                    @endif
                    @if(strlen($post->title) < 180)
                    {{implode(' ', array_slice(explode(' ', substr($post->title, 0, 180)), 0, 21)) }}
                    @endif

                    </h3>
                <div class="m-auto d-table mt-4 mb-2">
                <img class="" src="{{asset('img/1.jpg')}}" class="rounded " alt="image">
                </div>
                    <p class="mt-2 text-break">   

                        @if( strlen($post->body) > 512)
                        {{implode(' ', array_slice(explode(' ', substr($post->body, 0, 512)), 0, 100)) . '...'}}
                        @endif
                        @if(strlen($post->body) < 512)
                        {{implode(' ', array_slice(explode(' ', substr($post->body, 0, 512)), 0, 100)) }}
                        @endif
                    </p> 
                    <a href="#" class="btn btn-primary ms-auto">Read Post</a>
        
            </div>
        </div>
        @endforeach --}}

    </div>  
    </div>

  
</div>  


</div>



@endsection