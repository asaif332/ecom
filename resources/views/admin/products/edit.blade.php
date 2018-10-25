@extends('layouts.app')


@section('content')

<div class="container-fluid px-4 py-5">
  <h2>Edit Product</h2>

  <hr>

  <div class="card col-md-8 offset-md-2 p-0">
    <div class="card-body bg-light">
      <form action="{{ route('products.update' , ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="">Name :</label>
          <input type="text" name="name" value="{{$product->name}}" class="form-control">
          <span class="text-danger">{{$errors->first('name')}}</span>
        </div>
        <div class="form-group">
          <label for="">Description :</label>
          <textarea name="description" rows="3" class="form-control">{{$product->description}}</textarea>
          <span class="text-danger">{{$errors->first('description')}}</span>
        </div>
        <div class="form-group">
          <label for="">Image :</label>
          <input type="file" name="featured" value="{{$product->featured}}" class="form-control">
          <span class="text-danger">{{$errors->first('featured')}}</span>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="">Brand :</label>
              <select class="form-control" name="brand_id">
                <option value=""></option>
                @foreach ($brands as $brand)
                  <option {{($product->brand_id == $brand->id)?'selected':''}} value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
              </select>
              <span class="text-danger">{{$errors->first('brand_id')}}</span>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="">Stock :</label>
              <input type="text" name="stock" value="{{$product->stock}}" class="form-control">
              <span class="text-danger">{{$errors->first('stock')}}</span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="">Category :</label>
              <select class="form-control" name="category_id[]" multiple>
                <option value=""></option>
                @foreach ($cats as $cat)
                  <option value="{{$cat->id}}">{{$cat->h_name()}}</option>
                @endforeach
              </select>
              <span class="text-danger">{{$errors->first('category_id')}}</span>
            </div>
          </div>
          <div class="col-6 py-4 px-5">
            <div class="card">
              <div class="card-body py-0 px-3">
                <ul class="list-group list-group-flush">
                @foreach ($product->categories()->orderBy('parent_id')->get() as $cat)
                  <li class="list-group-item py-1">{{$cat->h_name()}} &nbsp; &nbsp;
                    <a href="{{ route('product.category.delete' , ['product_id' => $product->id , 'category_id' => $cat->id]) }}">
                      <span class="badge badge-danger">delete</span>
                    </a>
                  </li>
                @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="form-group text-center">
          <input type="submit" name="submit" value="Edit Product" class="btn btn-secondary">
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
