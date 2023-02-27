@if(Session()->has('success'))
<div class="alert alert-success mt-2" role="alert">
   <strong>Success: </strong>{{ Session::get('success') }}
  </div>
@endif
@if(count($errors) > 0)
<div class="alert alert-danger mt-2" role="alert">
    <strong>Errors:</strong>
    <ul class="mb-0">
    @foreach ($errors->all() as $error)
       <li> {{$error}}</li>
    @endforeach
    </ul>
   </div>
@endif