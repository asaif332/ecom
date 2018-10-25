@extends('layouts.front')

@section('content')

{{-- start --}}

<div id="all">
  <div id="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- breadcrumb-->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              @if ($category)
                @foreach ($category->h_parents() as $p)
                  <li class="breadcrumb-item"><a href="#">{{$p->name}}</a></li>
                @endforeach
              @else
                <li class="breadcrumb-item"><a href="#">Home / Products</a></li>
              @endif



            </ol>
          </nav>
        </div>
        <div class="col-lg-3">
          <!--
          *** MENUS AND FILTERS ***
          _________________________________________________________
          -->
          <div class="card sidebar-menu mb-4">
            <div class="card-header">
              <h3 class="h4 card-title">Categories</h3>
            </div>
            <div class="card-body">
              <ul class="nav nav-pills flex-column category-menu">
                @foreach ($parents as $par)
                  <li><a href="{{route('category' , ['id' => $par->id])}}" class="nav-link">{{$par->name}} <span class="badge badge-secondary">{{count($par->all_products())}}</span></a></li>
                  @foreach ($par->categories as $p)
                    <li>
                      <a href="{{route('category' , ['id' => $p->id])}}" class="nav-link ml-2 text-dark font-weight-bold"><u>{{$p->name}}</u></a>
                      <ul class="list-unstyled">
                        @foreach ($p->categories as $child)
                          <li><a href="{{route('category' , ['id' => $child->id])}}" class="nav-link">{{ucfirst($child->name)}}</a></li>
                        @endforeach
                      </ul>
                    </li>
                  @endforeach

                @endforeach
              </ul>
            </div>
          </div>
          <div class="card sidebar-menu mb-4">
            <div class="card-header">
              <h3 class="h4 card-title">Brands <a href="#" class="btn btn-sm btn-danger pull-right"><i class="fa fa-times-circle"></i> Clear</a></h3>
            </div>
            <div class="card-body">
              <form>
                <div class="form-group">
                  @foreach ($brands as $brand)
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> {{ucfirst($brand->name)}}
                      </label>
                    </div>
                  @endforeach

                </div>
                <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>
              </form>
            </div>
          </div>

          {{-- <div class="card sidebar-menu mb-4">
            <div class="card-header">
              <h3 class="h4 card-title">Colours <a href="#" class="btn btn-sm btn-danger pull-right"><i class="fa fa-times-circle"></i> Clear</a></h3>
            </div>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"><span class="colour white"></span> White (14)
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"><span class="colour blue"></span> Blue (10)
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"><span class="colour green"></span>  Green (20)
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"><span class="colour yellow"></span>  Yellow (13)
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"><span class="colour red"></span>  Red (10)
                    </label>
                  </div>
                </div>
                <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>
              </form>
            </div>
          </div> --}}
          <!-- *** MENUS AND FILTERS END ***-->
          <div class="banner"><a href="#"><img src="{{asset('img/banner.jpg')}}" alt="sales 2014" class="img-fluid"></a></div>
        </div>
        <div class="col-lg-9">
          <div class="box">
            @if ($category)
              <h1>{{$category->h_parents()[0]->name}} {{($category->h_parents()[0]->name == $category->name)?'':$category->name}}</h1>
            @else
              <h1>All products</h1>
            @endif


          </div>
          <div class="box info-bar">
            <div class="row">
              <div class="col-md-12 col-lg-4 products-showing">Showing <strong>12</strong> of <strong>25</strong> products</div>
              <div class="col-md-12 col-lg-7 products-number-sort">
                <form class="form-inline d-block d-lg-flex justify-content-between flex-column flex-md-row">
                  <div class="products-number"><strong>Show</strong><a href="#" class="btn btn-sm btn-primary">12</a><a href="#" class="btn btn-outline-secondary btn-sm">24</a><a href="#" class="btn btn-outline-secondary btn-sm">All</a><span>products</span></div>
                  <div class="products-sort-by mt-2 mt-lg-0"><strong>Sort by</strong>
                    <select name="sort-by" class="form-control">
                      <option>Price</option>
                      <option>Name</option>
                      <option>Sales first</option>
                    </select>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="row products">

            {{-- list products --}}
            @foreach ($products as $product)
              <div class="col-lg-4 col-md-6">
                <div class="product">
                  <div class="flip-container">
                    <div class="flipper">
                      <div class="front"><a href="{{route('detail' , ['id' => $product->id])}}"><img src="{{asset('uploads/products/'.$product->featured)}}" alt="" class="img-fluid"></a></div>
                      <div class="back"><a href="{{route('detail' , ['id' => $product->id])}}"><img src="{{asset('uploads/products/'.$product->featured)}}" alt="" class="img-fluid"></a></div>
                    </div>
                  </div><a href="{{route('detail' , ['id' => $product->id])}}" class="invisible"><img src="{{asset('uploads/products/'.$product->featured)}}" alt="" class="img-fluid"></a>
                  <div class="text">
                    <h3><a href="{{route('detail' , ['id' => $product->id])}}">{{$product->name}}</a></h3>

                    <p class="price">
                      <del>$280</del>$143.00
                    </p>
                    <p class="buttons">
                      <a href="{{route('detail' , ['id' => $product->id])}}" class="btn btn-outline-secondary">View detail</a>
                      <a href="{{route('add.cart' , ['id' => $product->id])}}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </p>
                  </div>
                  <!-- /.text-->
                  {{-- <div class="ribbon sale">
                    <div class="theribbon">SALE</div>
                    <div class="ribbon-background"></div>
                  </div>
                  <!-- /.ribbon-->
                  <div class="ribbon new">
                    <div class="theribbon">NEW</div>
                    <div class="ribbon-background"></div>
                  </div>
                  <!-- /.ribbon-->
                  <div class="ribbon gift">
                    <div class="theribbon">GIFT</div>
                    <div class="ribbon-background"></div>
                  </div> --}}
                  <!-- /.ribbon-->
                </div>
                <!-- /.product            -->
              </div>
            @endforeach

            <!-- /.products-->
          </div>
          <div class="pages">
            {{-- <p class="loadMore"><a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Load more</a></p> --}}
            {{-- <nav aria-label="Page navigation example" class="d-flex justify-content-center">
              <ul class="pagination">
                <li class="page-item"><a href="#" aria-label="Previous" class="page-link"><span aria-hidden="true">«</span><span class="sr-only">Previous</span></a></li>

                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" aria-label="Next" class="page-link"><span aria-hidden="true">»</span><span class="sr-only">Next</span></a></li>
              </ul>
            </nav> --}}

          </div>
          <div style="margin-left: 42%;">
            <p>
              @if (!is_array($products))
                {{  $products->links() }}
              @endif
            </p>
          </div>
        </div>
        <!-- /.col-lg-9-->
      </div>
    </div>
  </div>
</div>


{{-- end --}}
@endsection
