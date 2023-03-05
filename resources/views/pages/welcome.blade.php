 @extends('main')

@section('title', '| Homepage')

 @section('content')

 <div class=" p-5 text-bg-dark rounded-3 mt-4">
          <h2>Welcome to The Blog!</h2>
          <p>I'm really exited to bring you this new app!</p>
          <a class="btn btn-outline-light" type="button" href="{{route('blog.index')}}">Bring me to all blogposts</a>
        </div>
<!-- jumbo end end !-->

    <div class="row">
     
    <div class="col-8 h-100 ">

        @foreach($posts as $post)
    <div class="post p-4 text-bg-light border rounded-3 mt-4">
        <h3>
             {{ \Illuminate\Support\Str::limit($post->title, 127, '...')}}
        </h3>
        <div class="m-auto d-table mt-4 mb-2">
        <img class="" src="{{asset('img/1.jpg')}}" class="rounded " alt="image">
        </div>
            <p>   
                {{ \Illuminate\Support\Str::limit($post->body, 300, '...')}}
            </p> 
            @include('partials\_category')

            <a href="{{url('blog/'. $post->slug)}}" class="btn btn-primary">Read Post</a>

    
    </div>
    @endforeach
    <div class="div mt-3">
    {!! $posts->links(); !!}
  </div>
  </div>
  <div class="col-4 ">
    <h2 class="mt-4 text-end">Sidebar</h2>
  </div>
  @endsection