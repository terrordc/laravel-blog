@extends('main')

@section('title', '| Create post')

@section('stylesheets')
<link rel="stylesheet" href="../css/parsley.css">
@endsection

 @section('content')
 <div class="row mt-4">
    <div class="col-md-8 m-auto">
        <h1>Create New Post</h1>
        <hr>
        <form method="POST" action="{{ route('posts.store') }}" data-parsley-validate>


          <div class="form-group">
            <label for="title"> Title:</label>
            <input class="form-control" name="title" id="title" required minlength="5" maxlength="255"></input>
</div>
<div class="form-group">
  <label for="slug"> Slug:</label>
  <input class="form-control" name="slug" id="slug" minlength="5" maxlength="255"></textarea>
  <p class="text-muted mb-1 mt-1">If left null, slug is taken from title</p>
  </div>
<div class="form-group">
            <label for="body"> Post body:</label>
            <textarea class="form-control" name="body" rows="10" id="body" required></textarea>
            </div>
            <div class="form-group">
              <!-- attach image--> <label for="image">Attach file:</label>
              </div>
                <div class="row m-auto justify-content-around">
                  <a href="/posts" class="btn btn-lg btn-danger mt-3 col-md-3">Cancel</a>
                    <input class="btn btn-success btn-lg mt-3 col-md-8" type="submit" value="Submit"></input>
                    
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                <!-- At csrf works too! -->
          </form>
    </div>
 </div>
 @endsection

 @section('scripts')
<script src="../js/parsley.min.js"></script>
@endsection