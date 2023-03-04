@extends('main')

@section('title', '| All Users')

@section('content')
<div class="row">
    <div class="col-md-10 m-auto">

        <div class="row align-items-baseline">
<div class="mt-2 h1 col-10">All Users</div>
    <a class="btn btn-success col" href="{{route('users.create')}}">Create user</a>
</div>
<hr>
<div class="row">
    <div class="col-md-12 m-auto">
<table class="table table-sm table-hover" style="width:100%">
                <thead class="table-dark">
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created At</th>
                    <th></th>

                </thead>

                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th>{{$user->id}}</th>

                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role_id}}</td>
                        {{-- name instead of number --}}

                        <td>{{date('j F, Y, G:i ', strtotime($user->created_at))}}</td>
                        <td style="width:100px;text-align:center;">
                            <a href="{{ route('users.show' , $user->id)}}" class="btn btn-primary btn-sm border d-block m-auto mb-1">View</a>

                            <a href="{{ route('users.edit' , $user->id)}}" class="btn btn-success btn-sm border d-block m-auto mt-1">Edit</a>
                            <form method="POST" action="{{ route('users.destroy', $user->id) }}" class=" p-0"  >
                                <input type="submit" value="Delete" class="btn btn-danger d-block btn-sm border mt-1 w-100">
                                @csrf
                               {{ method_field('DELETE') }}
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>


            <div class="text-center m-auto d-flex justify-content-center">
                {!! $users->links(); !!}
            </div>
    </div>  
    </div>
</div>  
</div>


@endsection