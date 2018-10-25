@extends('layouts.app')

@section('content')

<div class="container-fluid px-4 py-5">
<h2>DashBoard</h2>
<hr>
<div class="row">
  <div class="col-md-3 col-sm-6 px-5 py-4">
    <div class="card shadow border-success">
      <div class="card-header bg-success text-white">
        <h4><b>Users</b></h4>
      </div>
      <div class="card-body">
        <p> </p>
        <p>Total : {{$users->count()}}</p>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6 px-5 py-4">
    <div class="card shadow border-teal">
      <div class="card-header bg-teal text-white">
        <h4><b>Products</b></h4>
      </div>
      <div class="card-body">
        <p> </p>
        <p>Total : {{$products->count()}}</p>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6 px-5 py-4">
    <div class="card shadow border-secondary">
      <div class="card-header bg-secondary text-white">
        <h4><b>Brand</b></h4>
      </div>
      <div class="card-body">
        <p> </p>
        <p>Total : {{$brands->count()}}</p>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6 px-5 py-4">
    <div class="card shadow border-info">
      <div class="card-header bg-info text-white">
        <h4><b>Categories</b></h4>
      </div>
      <div class="card-body">
        <p> </p>
        <p>Total : {{$cats->count()}}</p>
      </div>
    </div>
  </div>
</div>

<br><br><br>
{{-- next section --}}
<div class="container">
  <h3>Users</h3>
  
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead class="bg-success text-white">
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<br><br><br>
{{-- next section --}}
<div class="container">
  <h3>Products</h3>
  
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead class="bg-teal text-white">
        <th>Image</th>
        <th>Name</th>
        <th>Brand</th>
        <th>Category</th>
      </thead>
      <tbody>
        @foreach ($products as $product)
          <tr>
            <td><img src="{{asset('uploads/products/'.$product->featured) }}" alt="{{$product->name}}" width="60" height="60"></td>
            <td>{{$product->name}}</td>
            <td>{{$product->brand->name}}</td>
            <td>
              @php
                foreach ($product->categories as $c) {
                  echo $c->h_name()."<br>";
                }
              @endphp
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<br><br><br>
{{-- next section --}}
<div class="container">
  <h3>Brands</h3>
  
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead class="bg-secondary text-white">
        <th>S.N</th>
        <th>Name</th>
      </thead>
      <tbody>
        @php
          $count = 0;
        @endphp
        @foreach ($brands as $brand)
          <tr>
            <td>{{++$count}}</td>
            <td>{{$brand->name}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>


<br><br><br>
{{-- next section --}}
<div class="container">
  <h3>Categories</h3>
  
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead class="bg-info text-white">
        <th>S.N</th>
        <th>Name</th>
      </thead>
      <tbody>
        @php
          $count = 0;
        @endphp
        @foreach ($cats as $cat)
          <tr>
            <td>{{++$count}}</td>
            <td>{{$cat->h_name()}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>


</div>
@endsection
