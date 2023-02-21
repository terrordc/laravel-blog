 @extends('main')

@section('title', '| Homepage')

 @section('content')

 <div class=" p-5 text-bg-dark rounded-3 mt-4">
          <h2>Change the background</h2>
          <p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look. Then, mix and match with additional component themes and more.</p>
          <button class="btn btn-outline-light" type="button">Example button</button>
        </div>
<!-- jumbo end end !-->

    <div class="row">
      
    <div class="col-8 h-100 ">
    <div class="post p-4 text-bg-light rounded-3 mt-4">
        <h3>Post Title</h3>
        <div class="m-auto d-table mt-4 mb-2">
        <img class="" src="{{asset('img/1.jpg')}}" class="rounded " alt="image">
        </div>
            <p>   
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum tenetur
                exercitationem veritatis quas, debitis illo deserunt impedit nisi velit beatae
                consequuntur vero?
            </p> 
            <a href="#" class="btn btn-primary">Read Post</a>

    </div>
    <hr>
    <div class="post p-4 text-bg-light rounded-3 mt-4">
        <h3>Post Title</h3>
        <div class="m-auto d-table mt-4 mb-2">
        <img class="" src="{{asset('img/1.jpg')}}" class="rounded " alt="image">
        </div>
            <p>   
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum tenetur
                exercitationem veritatis quas, debitis illo deserunt impedit nisi velit beatae
                consequuntur vero?
            </p> 
            <a href="#" class="btn btn-primary">Read Post</a>
    </div>

    <hr>

        <div class="post p-4 text-bg-light rounded-3 mt-4">
        <h3>Post Title</h3>
        <div class="m-auto d-table mt-4 mb-2">
        <img class="" src="{{asset('img/1.jpg')}}" class="rounded " alt="image">
        </div>
            <p>   
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum tenetur
                exercitationem veritatis quas, debitis illo deserunt impedit nisi velit beatae
                consequuntur vero?
            </p> 
            <a href="#" class="btn btn-primary">Read Post</a>
    </div>

    <hr>
    <div class="post p-4 text-bg-light rounded-3 mt-4">
        <h3>Post Title</h3>
        <div class="m-auto d-table mt-4 mb-2">
        <img class="" src="{{asset('img/1.jpg')}}" class="rounded " alt="image">
        </div>
            <p>   
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum tenetur
                exercitationem veritatis quas, debitis illo deserunt impedit nisi velit beatae
                consequuntur vero?
            </p> 
            <a href="#" class="btn btn-primary">Read Post</a>
    </div>
    
    </div>
    <div class="col-4 ">
        <h2 class="mt-4 text-end">Sidebar</h2>
      </div>
  </div>
  @endsection