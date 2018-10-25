
  @extends('layouts.app')

  @section('content')

  <div class="container-fluid px-4 py-5">
    <a href="{{route('products.create')}}" class="btn btn-sm btn-secondary float-right">add new</a>
    <h2>Products</h2>
    <hr>
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <th>Image </th>
          <th>Name </th>
          <th>Brand </th>
          <th>Category </th>
          <th>stock</th>
          <th>Actions</th>
        </thead>
        <tbody>
          @foreach ($products  as $product)
            <tr>
              <td> <img src="{{asset('uploads/products/'.$product->featured) }}" alt="{{$product->name}}" width="60" height="60"> </td>
              <td>{{$product->name}}</td>
              <td>{{$product->brand->name}}</td>
              <td>

                @php
                  foreach ($product->categories()->orderBy('parent_id')->get() as $c) {
                    echo $c->h_name()."<br>";
                  }
                @endphp
              </td>
              <td>{{$product->stock}}</td>
              <td>
                <a href="{{route('products.edit' , ['id' => $product->id])}}" class="btn btn-secondary btn-sm">edit</a>
                <a onclick="
                  var x = confirm('Do you want to delete this product?');
                  if(x){
                    $('#delete-product-{{$product->id}}').submit();
                  }
                  return false;
                  " class="btn btn-danger btn-sm text-white">delete</a>
                  <form id="delete-product-{{$product->id}}" action="{{route('products.destroy' , ['id' => $product->id])}}" method="post">
                    @csrf
                    @method('DELETE')
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
