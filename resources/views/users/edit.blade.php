@extends('main')

@section('title', '| Edit User')

@section('content')
<div class="row mt-4">
    <div class="col-md-8">

        <form method="POST" action="{{ route('users.update', $user->id) }}">
            <div class="form-group">
              <label for="name">Username:</label>
              <textarea type="text" class="form-control" id="name" name="name" rows="1" style="resize:none;">{{ $user->name }}</textarea>
            </div>
            <div class="form-group">
                <label for="email"> Email:</label>
                <textarea class="form-control" name="email" id="email" rows="1" style="resize:none; " >{{ $user->email }}</textarea>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <textarea type="text" class="form-control " id="password" name="password" rows="1">{{ $user->password }}</textarea>
                  </div>
                </div>

                
                <div class="form-group">
                  <label for="role_id"> Role:</label>
                <select class="form-control" name="role_id" id="role_id" data-parsley-range="[1, 3]">
                  <option value="1">User</option>
                  <option value="2">Editor</option>
                  <option value="3">Admin</option>
                </select>
              </div>
          
            </div>
          
<div class="col-md-4 mt-4">
    <div class="card">
    <div class="card-body">

         <dl class="dl-horizontal">
        <dt>Created at:</dt>
        <dd>{{date('j F, Y, G:i ', strtotime($user->created_at))}}</dd>
    </dl>
    <dl class="dl-horizontal">
        <dt>Created at:</dt>
        <dd>{{date('j F, Y, G:i ', strtotime($user->updated_at))}}</dd>
    </dl>
   

    
    <hr>

    <div class="row justify-content-between m-0">
        
            <a href="{{ route('users.show', $user->id) }}" class="btn btn-danger btn-block mt-2 col-5 ">Cancel</a>
       
            <button type="submit" class="btn btn-primary btn-block mt-2 col-5">Save</button>
            @csrf
            {{ method_field('PUT') }}
          </form>
    </div>

</div>
        </div>
    </div>
</div>

</div>


@endsection