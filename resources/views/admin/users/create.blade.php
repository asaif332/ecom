@extends('layouts.app')

@section('content')

<div class="container-fluid px-4 py-5">
  <h2>Create User</h2>
  <hr>
  <div class="card col-md-8 offset-md-2 p-0">
    <div class="card-body">
      <form action="{{ route('users.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="">Name :</label>
          <input type="text" name="name" value="{{old('name')}}" class="form-control">
          <span class="text-danger">{{$errors->first('name')}}</span>
        </div>
        <div class="form-group">
          <label for="">Email :</label>
          <input type="text" name="email" value="{{old('email')}}" class="form-control">
          <span class="text-danger">{{$errors->first('email')}}</span>
        </div>
        <div class="form-group">
          <label for="">Password :</label>
          <input type="password" name="password" value="" class="form-control">
          <span class="text-danger">{{$errors->first('password')}}</span>
        </div>
        <div class="form-group">
          <label for="">Role :</label>
          <select class="form-control" name="role_id">
            @foreach ($roles as $r)
              <option {{(old('role_id') == $r->id)?'selected':''}} value="{{$r->id}}">{{$r->name}}</option>
            @endforeach
          </select>
          <span class="text-danger">{{$errors->first('role_id')}}</span>
        </div>
        <div class="form-group text-center">
          <input type="submit" name="submit" value="add user" class="btn btn-secondary">
        </div>
      </form>
    </div>
  </div>
</div>





@endsection
