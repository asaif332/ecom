
    @extends('layouts.app')

    @section('content')

    <div class="container-fluid px-4 py-5">
      <h2>Edit Brand</h2>
      <hr>
    <div class="container text-center">
      <form class="col-md-6 offset-md-3" action="{{route('brands.update' , ['id' => $brand->id])}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
          <input type="text" name="name" value="{{$brand->name}}" class="form-control">
          <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>
        <div class="form-group">
          <input type="submit" name="submit" value="Edit Brand" class="btn btn-sm btn-secondary">
        </div>
      </form>
    </div>
    </div>

    @endsection
