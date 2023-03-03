
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Blog</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-0 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/blog">Blog</a>
        </li>
        @can('create', App\Models\Post::class)
        <li class="nav-item">
          <a class="nav-link" href="/posts/create">New post</a>
        </li>
        @endcan
</ul>

        <ul class="navbar-nav ms-auto mb-0 mb-lg-0">
          @can('create', App\Models\Post::class)
        <a href="/posts/create" class="btn btn-primary ms-auto me-2 d-none d-lg-block">New Post</a>
        @endcan
        <li class="nav-item dropdown">
        
          
            @if(auth()->user() == null)
            <a class="nav-link dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-expanded="false">{{'You are not logged in'}}</a>
            <ul class="dropdown-menu dropdown-menu-end">
            
              <li><a class="dropdown-item" href="{{route('login')}}">Log in</a></li>
              <li><a class="dropdown-item" href="{{route('register')}}">Register</a></li>
              
            </li>
            @else
            <a class="nav-link dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-expanded="false">{{auth()->user()->name}}</a>
            <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="{{route('dashboard')}}">Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><form method="POST" action="http://localhost:8000/logout">
              @csrf
              <a class="dropdown-item" href="http://localhost:8000/logout" onclick="event.preventDefault();this.closest('form').submit();">Log Out</a>
          </form>
        </li>

            @endif
        
          

            
                

          </ul>
         
        </li>


      </ul>

    </div>
  </div>
</nav>