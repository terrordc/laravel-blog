@extends('main')

@section('title', '| Create User')

@section('stylesheets')
<link rel="stylesheet" href="../css/parsley.css">
@endsection

 @section('content')
 <div class="row mt-4">
    <div class="col-md-8 m-auto">
        <h1>Create New User</h1>
        <hr>
        <form method="POST" action="{{ route('users.store') }}" data-parsley-validate>


          <div class="form-group">
            <label for="name"> Name:</label>
            <input class="form-control" name="name" id="name" required maxlength="255"></input>
</div>
<div class="form-group">
  <label for="email"> Email:</label>
  <input class="form-control" name="email" id="email" data-parsley-type="email"></textarea>
 
  </div>

    <div class="form-group">
      <label for="role_id"> Role:</label>
    <select class="form-control" name="role_id" id="role_id" data-parsley-range="[1, 3]">
      <option value="1">User</option>
      <option value="2">Editor</option>
      <option value="3">Admin</option>
    </select>
  </div>
<div class="form-group">
            <label for="password"> Password:</label>
            <textarea class="form-control" name="password" type="password" rows="1" id="password" required minlength="8"></textarea>
            </div>
            <div class="form-group">
              <label for="repeat-password">Repeat password:</label>
              <textarea class="form-control" name="repeat-password" type="password" rows="1" id="repeat-password" required data-parsley-equalto="#password"></textarea>
              </div>
            
                <div class="row m-auto justify-content-around">
                  <a href="/users" class="btn btn-lg btn-danger mt-3 col-md-3">Cancel</a>
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