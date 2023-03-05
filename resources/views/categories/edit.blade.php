@extends('main')

@section('title', '| Edit Category')

@section('content')
<div class="row mt-4">
    <div class="col-md-8">

        <form method="POST" action="{{ route('categories.update', $category->id) }}">
            <div class="form-group">
              <label for="name">Category name:</label>
              <textarea type="text" class="form-control" id="name" name="name" rows="1" style="resize:none;">{{ $category->name }}</textarea>
            </div>
        </div>
          
<div class="col-md-4 mt-4">
    <div class="card">
    <div class="card-body">

         <dl class="dl-horizontal">
        <dt>Created at:</dt>
        <dd>{{date('j F, Y, G:i ', strtotime($category->created_at))}}</dd>
    </dl>
    <dl class="dl-horizontal">
        <dt>Created at:</dt>
        <dd>{{date('j F, Y, G:i ', strtotime($category->updated_at))}}</dd>
    </dl>
   

    
    <hr>

    <div class="row justify-content-between m-0">
        
            <a href="{{ route('categories.index') }}" class="btn btn-danger btn-block mt-2 col-5 ">Cancel</a>
       
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