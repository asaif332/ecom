@extends('layouts.app')

@section('content')

<div class="container-fluid px-4 py-5">
  <h2>My Profile</h2>
  <hr>
  <div class="card">
    <div class="card-body px-5 py-5">
      <h4> <strong> Name :</strong> {{ $me->name }}</h4>
      <h4> <strong> Email :</strong> {{ $me->email }}</h4>
      <a href="{{ route('profile.edit') }}" class="btn btn-secondary">Edit Profile</a>
    </div>
  </div>
</div>

@endsection
