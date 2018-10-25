@extends('layouts.app')


@section('content')

<div class="container-fluid px-4 py-5">
  <h2>Create Product</h2>

  <hr>

  <div class="card col-md-8 offset-md-2 p-0">
    <div class="card-body bg-light">
      <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="">Name :</label>
          <input type="text" name="name" value="{{old('name')}}" class="form-control">
          <span class="text-danger">{{$errors->first('name')}}</span>
        </div>
        <div class="form-group">
          <label for="">Description :</label>
          <textarea name="description" rows="3" class="form-control">{{old('description')}}</textarea>
          <span class="text-danger">{{$errors->first('description')}}</span>
        </div>
        <div class="form-group">
          <label for="">Image :</label>
          <input type="file" name="featured" value="{{old('featured')}}" class="form-control">
          <span class="text-danger">{{$errors->first('featured')}}</span>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="">Brand :</label>
              <select class="form-control" name="brand_id">
                <option value=""></option>
                @foreach ($brands as $brand)
                  <option {{(old('brand_id') == $brand->id)?'selected':''}} value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
              </select>
              <span class="text-danger">{{$errors->first('brand_id')}}</span>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="">Stock :</label>
              <input type="text" name="stock" value="{{old('stock')}}" class="form-control">
              <span class="text-danger">{{$errors->first('stock')}}</span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="">Category :</label>
          <select class="form-control" name="category_id[]" multiple="multiple">
            <option value=""></option>
            @foreach ($cats as $cat)
              <option value="{{$cat->id}}">{{$cat->h_name()}}</option>
            @endforeach
          </select>
          <span class="text-danger">{{$errors->first('category_id')}}</span>
        </div>
        <div class="form-group text-center">
          <input type="submit" name="submit" value="Add Product" class="btn btn-secondary">
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
