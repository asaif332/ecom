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
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li aria-current="page" class="breadcrumb-item active">Shopping cart</li>
              </ol>
            </nav>
          </div>
          <div id="basket" class="col-lg-9">
            <div class="box">
              <form method="post" action="{{route('cart.checkout')}}">
                @csrf
                <h1>Shopping cart</h1>
                <p class="text-muted">You currently have {{Cart :: getcontent()->count()}} item(s) in your cart.</p>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th colspan="2">Product</th>
                        <th>Quantity</th>
                        <th>Unit price</th>
                        <th>Discount</th>
                        <th colspan="2">Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach (Cart :: getContent() as $item)
                        <tr>
                          <td><a href="#"><img src="{{asset('uploads/products/'.$item->attributes->model->featured)}}" width="40" alt="White Blouse Armani"></a></td>
                          <td><a href="#">{{$item->name}}</a></td>
                          <td>
                            <a href="{{route('decr.item.cart' , ['id' => $item->id])}}" class="btn btn-sm btn-dark">--</a>
                            <input type="number" value="{{$item->quantity}}" class="form-control d-inline" disabled>
                            <a href="{{route('incr.item.cart' , ['id' => $item->id])}}" class="btn btn-sm btn-dark">+</a>
                          </td>
                          <td>${{$item->price}}</td>
                          <td>${{$item->discount}}</td>
                          <td>${{$item->getPriceSum()}}</td>
                          <td><a href="{{route('remove.item.cart' , ['id' => $item->id])}}"><i class="fa fa-trash-o"></i></a></td>
                        </tr>
                      @endforeach


                    </tbody>
                    <tfoot>
                      <tr>
                        <th colspan="5">Total</th>
                        <th colspan="2">${{Cart :: getTotal()}}</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.table-responsive-->
                <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                  <div class="left"><a href="{{route('category' , ['id' => 0])}}" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Continue shopping</a></div>
                  <div class="right">

                    <button type="submit" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i></button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.box-->
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
                    </div><a href="{{route('detail' , ['id' => $pro->id])}}" class="invisible"><img src="{{asset('uploads/products/'.$pro->featured)}}" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3>{{$pro->name}}</h3>
                      <p class="price">$143</p>
                    </div>
                  </div>
                  <!-- /.product-->
                </div>
              @endforeach
            </div>
          </div>
          <!-- /.col-lg-9-->
          <div class="col-lg-3">
            <div id="order-summary" class="box">
              <div class="box-header">
                <h3 class="mb-0">Order summary</h3>
              </div>
              <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>Order subtotal</td>
                      <th>${{Cart :: getSubTotal()}}</th>
                    </tr>
                    <tr>
                      <td>Shipping and handling</td>
                      <th></th>
                    </tr>
                    <tr>
                      <td>Tax</td>
                      <th></th>
                    </tr>
                    <tr class="total">
                      <td>Total</td>
                      <th>${{Cart :: getTotal()}}</th>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="box">
              <div class="box-header">
                <h4 class="mb-0">Coupon code</h4>
              </div>
              <p class="text-muted">If you have a coupon code, please enter it in the box below.</p>
              <form>
                <div class="input-group">
                  <input type="text" class="form-control"><span class="input-group-append">
                    <button type="button" class="btn btn-primary"><i class="fa fa-gift"></i></button></span>
                </div>
                <!-- /input-group-->
              </form>
            </div>
          </div>
          <!-- /.col-md-3-->
        </div>
      </div>
    </div>
  </div>

@endsection
