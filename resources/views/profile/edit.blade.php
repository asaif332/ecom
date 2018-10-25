@extends('layouts.app')

@section('content')

<div class="container-fluid px-4 py-5">
  <h2>Edit Profile</h2>
  <hr>
  <div class="card">
    <div class="card-body px-5 py-5">
      <form action="{{ route('profile.update') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="">Name :</label>
          <input type="text" name="name" value="{{ $me->name }}" class="form-control">
        </div>
        <div class="form-group">
          <input type="submit" name="submit" value="Edit Profile">
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
