@extends('layouts.front')



@section('content')

  <div id="all">
    <div id="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <!-- breadcrumb-->
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                @foreach ($product->categories[0]->h_parents() as $p)
                  <li class="breadcrumb-item">{{$p->name}}</li>
                @endforeach

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
            <div id="productMain" class="row">
              <div class="col-md-6">
                <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                  <div class="item"> <img src="{{asset('uploads/products/'.$product->featured)}}" alt="" class="img-fluid"></div>
                  <div class="item"> <img src="{{asset('uploads/products/'.$product->featured)}}" alt="" class="img-fluid"></div>
                  <div class="item"> <img src="{{asset('uploads/products/'.$product->featured)}}" alt="" class="img-fluid"></div>
                </div>
                {{-- <div class="ribbon sale">
                  <div class="theribbon">SALE</div>
                  <div class="ribbon-background"></div>
                </div>
                <!-- /.ribbon-->
                <div class="ribbon new">
                  <div class="theribbon">NEW</div>
                  <div class="ribbon-background"></div>
                </div> --}}
                <!-- /.ribbon-->
              </div>
              <div class="col-md-6">
                <div class="box">
                  <h1 class="text-center">{{$product->name}}</h1>
                  <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details, material &amp; care and sizing</a></p>
                  <p class="price">$124.00</p>
                  <p class="text-center buttons">
                    <a href="{{route('add.cart' , ['id' => $product->id])}}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                    {{-- <a href="basket.html" class="btn btn-outline-primary"><i class="fa fa-heart"></i> Add to wishlist</a> --}}
                  </p>
                </div>
                <div data-slider-id="1" class="owl-thumbs">
                  <button class="owl-thumb-item"><img src="img/detailsquare.jpg" alt="" class="img-fluid"></button>
                  <button class="owl-thumb-item"><img src="img/detailsquare2.jpg" alt="" class="img-fluid"></button>
                  <button class="owl-thumb-item"><img src="img/detailsquare3.jpg" alt="" class="img-fluid"></button>
                </div>
              </div>
            </div>
            <div id="details" class="box">
              <p></p>
              <h4>Product details</h4>
              <p>White lace top, woven, has a round neck, short sleeves, has knitted lining attached</p>
              <h4>Material &amp; care</h4>
              <ul>
                <li>Polyester</li>
                <li>Machine wash</li>
              </ul>
              <h4>Size &amp; Fit</h4>
              <ul>
                <li>Regular fit</li>
                <li>The model (height 5'8" and chest 33") is wearing a size S</li>
              </ul>
              <blockquote>
                <p><em>Define style this season with Armani's new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.</em></p>
              </blockquote>
              <hr>
              <div class="social">
                <h4>Show it to your friends</h4>
                <p><a href="#" class="external facebook"><i class="fa fa-facebook"></i></a><a href="#" class="external gplus"><i class="fa fa-google-plus"></i></a><a href="#" class="external twitter"><i class="fa fa-twitter"></i></a><a href="#" class="email"><i class="fa fa-envelope"></i></a></p>
              </div>
            </div>
            <div class="row same-height-row">
              <div class="col-lg-3 col-md-6">
                <div class="box same-height">
                  <h3>You may also like these products</h3>
                </div>
              </div>
              @foreach ($more_products as $pro)
                <div class="col-lg-3 col-md-6">
                  <div class="product same-height">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="{{route('detail' , ['id' => $pro->id])}}"><img src="{{asset('uploads/products/'.$pro->featured)}}" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="{{route('detail' , ['id' => $pro->id])}}"><img src="{{asset('uploads/products/'.$pro->featured)}}" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="{{route('detail' , ['id' => $pro->id])}}" class="invisible"><img src="i{{asset('uploads/products/'.$pro->featured)}}" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3>{{$pro->name}}</h3>
                      <p class="price">$143</p>
                    </div>
                  </div>
                  <!-- /.product-->
                </div>
              @endforeach

            </div>

            {{-- <div class="row same-height-row">
              <div class="col-lg-3 col-md-6">
                <div class="box same-height">
                  <h3>Products viewed recently</h3>
                </div>
              </div>
              <div class="col-lg-3 col-md-6">
                <div class="product same-height">
                  <div class="flip-container">
                    <div class="flipper">
                      <div class="front"><a href="detail.html"><img src="img/product2.jpg" alt="" class="img-fluid"></a></div>
                      <div class="back"><a href="detail.html"><img src="img/product2_2.jpg" alt="" class="img-fluid"></a></div>
                    </div>
                  </div><a href="detail.html" class="invisible"><img src="img/product2.jpg" alt="" class="img-fluid"></a>
                  <div class="text">
                    <h3>Fur coat</h3>
                    <p class="price">$143</p>
                  </div>
                </div>
                <!-- /.product-->
              </div>

            </div> --}}
          </div>
          <!-- /.col-md-9-->
        </div>
      </div>
    </div>
  </div>

@endsection
