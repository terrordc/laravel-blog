@extends('main')

@section('title', '| All Categories')

@section('content')
<div class="row">
    <div class="col-md-8 m-auto">
        
<h1 class="mt-2">All Categories</h1>
<hr>

<table class="table table-sm table-hover" style="width:100%">
                <thead class="table-dark">
                    <th>#</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <th></th>

                </thead>

                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <th>{{$category->id}}</th>
                        <td>{{$category->name}}</td>
                        <td>{{date('j F, Y, G:i ', strtotime($category->created_at))}}</td>
                        <td style="width:12%; text-align:center;">
                            {{-- <a href="{{ route('categories.show' , $category->id)}}" class="btn btn-primary btn-sm border d-block m-auto mb-1">View</a>

                            <a href="{{ route('categories.edit' , $category->id)}}" class="btn btn-success btn-sm border d-block m-auto mt-1">Edit</a> --}}
                            <form method="POST" action="{{ route('categories.destroy', $category->id) }}" class=" p-0"  >
                                <input type="submit" value="Delete" class="btn btn-danger d-block btn-sm border mt-1">
                                @csrf
                               {{ method_field('DELETE') }}
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>


            <div class="text-center m-auto d-flex justify-content-center">
                {!! $categories->links(); !!}
            </div>
    </div>  

    <div class="col-md-3 mt-5">
        <div class="card">
            <div class="card-body"> 
                <form method="POST" action="{{ route('categories.store') }}">
                    <div class="form-group">
                      <label for="name">Category name:</label>
                      <textarea type="text" class="form-control" id="name" name="name" rows="1" style="resize:none;"></textarea>
                      <input class="btn btn-success btn-lg mt-3 btn-block" type="submit" value="Submit"></input>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </div>

            </div>
            </div>
    </div>



@endsection