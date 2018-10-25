@extends('layouts.app')


@section('content')
  <div class="container-fluid px-4 py-5">
    <div class="col-md-8 offset-md-2">
      <div class="card">
        <div class="card-header">
          Add Category
        </div>
        <div class="card-body">
          <form action="{{ route('categories.store') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="">Name :</label>
              <input type="text" name="name" value="{{ old('name') }}" class="form-control">
              <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>
            <div class="form-group">
              <label for="">Parent :</label>
              <select class="form-control" name="parent_id[]" multiple>
                <option value="0">parent</option>
                @foreach ($cats as $cat)
                  <option value="{{$cat->id}}">{{ $cat->h_name() }}</option>
                @endforeach
              </select>
              <span class="text-danger">{{ $errors->first('parent_id') }}</span>
            </div>
            <div class="form-group">
              <input type="submit" name="submit" value="Add Category" class="btn btn-sm btn-secondary">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
