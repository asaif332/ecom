
  @extends('layouts.app')

  @section('content')

  <div class="container-fluid px-4 py-5">
    <h2>Brands</h2>
    <hr>
    <div class="row">
      <div class="col-sm-6">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <th>Name :</th>
              <th>Actions</th>
            </thead>
            <tbody>
              @foreach ($brands as $brand)
                <tr>
                  <td>{{ $brand->name }}</td>
                  <td>
                    <a class="btn btn-secondary btn-sm" href="{{ route('brands.edit' , ['id' => $brand->id]) }}">edit</a>
                    <a class="btn btn-danger btn-sm text-white" onclick="
                    var x = confirm('Do you want to delete the brand');
                    if(x){
                      $('#brand-delete-{{$brand->id}}').submit();
                    }
                    return false;
                    ">delete</a>
                    <form id="brand-delete-{{$brand->id}}" action="{{route('brands.destroy' , ['id' => $brand->id])}}" method="post">
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

      <div class="col-sm-6">
        <div class="card">
          <div class="card-header">
            Add Brand
          </div>
          <div class="card-body">
            <form action="{{ route('brands.store') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="">Name :</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                <span class="text-danger">{{ $errors->first('name') }}</span>
              </div>
              <div class="form-group">
                <input type="submit" name="submit" value="Add Brand" class="btn btn-sm btn-secondary">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


  </div>

  @endsection
