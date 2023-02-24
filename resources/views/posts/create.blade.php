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
            <input class="form-control" name="title" id="title" required maxlength="255"></input>
</div>
<div class="form-group">
            <label for="body"> Post body:</label>
            <textarea class="form-control" name="body" rows="10" id="body" required></textarea>
            </div>
            <div class="form-group">
              <!-- attach image--> <label for="image">Attach file:</label>
              </div>
                <div class="d-grid">
                    <input class="btn btn-success btn-block btn-lg mt-3" type="submit" value="Submit"></input>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                <!-- @csrf works too! -->
          </form>
    </div>
 </div>
 @endsection

 @section('scripts')
<script src="../js/parsley.min.js"></script>
@endsection