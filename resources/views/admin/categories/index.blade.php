
  @extends('layouts.app')

  @section('content')

  <div class="container-fluid px-4 py-5">
    <a href="{{route('categories.create')}}" class="btn btn-secondary btn-sm float-right">add new</a>
    <h2>Categories</h2>
    <hr>

    <div class="row">
      <div class="col-sm-12">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <th>Name </th>

              <th>Actions</th>
            </thead>
            <tbody>
              @foreach ($cats as $cat)
                <tr>

                  <td>{{$cat->h_name()}}</td>
                  <td>
                    <a class="btn btn-secondary btn-sm" href="{{ route('categories.edit' , ['id' => $cat->id]) }}">edit</a>
                    <a class="btn btn-danger btn-sm text-white" onclick="
                    var x = confirm('Do you want to delete the category');
                    if(x){
                      $('#cat-delete-{{$cat->id}}').submit();
                    }
                    return false;
                    ">delete</a>
                    <form id="cat-delete-{{$cat->id}}" action="{{route('categories.destroy' , ['id' => $cat->id])}}" method="post">
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
  </div>

  @endsection
