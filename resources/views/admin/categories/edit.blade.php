@extends('layouts.app')


@section('content')
  <div class="container-fluid px-4 py-5">
    <div class="col-md-8 offset-md-2">
      <div class="card">
        <div class="card-header">
          Edit Category
        </div>
        <div class="card-body">
          <form action="{{ route('categories.update' , ['id' => $cat->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="">Name :</label>
              <input type="text" name="name" value="{{ $cat->name }}" class="form-control">
              <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>

            <div class="form-group">
              <input type="submit" name="submit" value="Edit Category" class="btn btn-sm btn-secondary">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
