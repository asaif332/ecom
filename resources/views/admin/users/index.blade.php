@extends('layouts.app')

@section('content')

<div class="container-fluid px-4 py-5">
  <a class="btn btn-sm btn-secondary float-right" href="{{route('users.create')}}">add user</a>
  <h2>Users</h2>
  <hr>
  <div class="col-md-8 offset-md-2">
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead class="bg-secondary text-white">
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Actions</th>
        </thead>
        <tbody>
          @foreach ($users as $user)
            <tr>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->role->name}}</td>
              <td>
                <a class="btn btn-sm btn-secondary text-white" onclick="
                var x = confirm('Do you want to delete the user?');
                if(x) {
                  $('#user-delete-{{$user->id}}').submit();
                }
                return false;
                ">delete</a>
                <form id="user-delete-{{$user->id}}" action="{{ route('users.destroy' , ['id' => $user->id])}}" method="post">
                  @method('DELETE')
                  @csrf
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
