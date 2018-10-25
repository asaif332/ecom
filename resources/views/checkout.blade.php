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
                <li aria-current="page" class="breadcrumb-item active">Checkout - Address</li>
              </ol>
            </nav>
          </div>
          <div id="checkout" class="col-lg-9">
            <div class="box">
              <form method="post" action="">
                <h1>Checkout - Address</h1>
                <div class="nav flex-column flex-md-row nav-pills text-center">
                  <a id="pill-address" class="nav-link flex-sm-fill text-sm-center active disabled" data-toggle="pill" href="#address"> <i class="fa fa-map-marker"></i>Address</a>
                  {{-- <a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-truck"></i>Delivery Method</a> --}}
                  <a id="pill-payment" class="nav-link flex-sm-fill text-sm-center disabled" data-toggle="pill" href="#payment"> <i class="fa fa-money"></i>Payment Method</a>
                  <a id="pill-review" class="nav-link flex-sm-fill text-sm-center disabled" data-toggle="pill" href="#review"> <i class="fa fa-eye"></i>Order Review</a></div>


                  <div class="tab-content py-3">
                    <div class="tab-pane container active" id="address">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="firstname">Firstname</label>
                            <input id="firstname" type="text" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="lastname">Lastname</label>
                            <input id="lastname" type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                      <!-- /.row-->
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="company">Company</label>
                            <input id="company" type="text" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="street">Street</label>
                            <input id="street" type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                      <!-- /.row-->
                      <div class="row">
                        <div class="col-md-6 col-lg-3">
                          <div class="form-group">
                            <label for="city">Company</label>
                            <input id="city" type="text" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                          <div class="form-group">
                            <label for="zip">ZIP</label>
                            <input id="zip" type="text" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                          <div class="form-group">
                            <label for="state">State</label>
                            <select id="state" class="form-control"></select>
                          </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                          <div class="form-group">
                            <label for="country">Country</label>
                            <select id="country" class="form-control"></select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="phone">Telephone</label>
                            <input id="phone" type="text" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="text" class="form-control">
                          </div>
                        </div>
                      </div>

                      <hr>
                      <div class="d-flex justify-content-between">
                        <a href="#" class="btn btn-outline-secondary disabled"><i class="fa fa-chevron-left"></i>Previous</a>
                        <a onclick="click_pill('payment')" class="btn btn-primary">Continue to Payment<i class="fa fa-chevron-right"></i></a>
                      </div>

                    </div>


                    {{--  --}}
                    <div class="tab-pane container" id="payment">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="box payment-method">
                            <h4>Paypal</h4>
                            <p>We like it all.</p>
                            <div class="box-footer text-center">
                              <input type="radio" name="payment" value="payment1">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="box payment-method">
                            <h4>Payment gateway</h4>
                            <p>VISA and Mastercard only.</p>
                            <div class="box-footer text-center">
                              <input type="radio" name="payment" value="payment2">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="box payment-method">
                            <h4>Cash on delivery</h4>
                            <p>You pay when you get it.</p>
                            <div class="box-footer text-center">
                              <input type="radio" name="payment" value="payment3">
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="d-flex justify-content-between">
                        <a onclick="click_pill('address')" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Previous</a>
                        <a onclick="click_pill('review')" class="btn btn-primary">Continue to Order Review<i class="fa fa-chevron-right"></i></a>
                      </div>
                    </div>

                    {{--  --}}
                    <div class="tab-pane container" id="review">
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th colspan="2">Product</th>
                              <th>Quantity</th>
                              <th>Unit price</th>
                              <th>Discount</th>
                              <th>Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><a href="#"><img src="img/detailsquare.jpg" alt="White Blouse Armani"></a></td>
                              <td><a href="#">White Blouse Armani</a></td>
                              <td>2</td>
                              <td>$123.00</td>
                              <td>$0.00</td>
                              <td>$246.00</td>
                            </tr>
                            <tr>
                              <td><a href="#"><img src="img/basketsquare.jpg" alt="Black Blouse Armani"></a></td>
                              <td><a href="#">Black Blouse Armani</a></td>
                              <td>1</td>
                              <td>$200.00</td>
                              <td>$0.00</td>
                              <td>$200.00</td>
                            </tr>
                          </tbody>
                          <tfoot>
                            <tr>
                              <th colspan="5">Total</th>
                              <th>$446.00</th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                      <hr>
                      <div class="d-flex justify-content-between">
                        <a onclick="click_pill('payment')" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Previous</a>
                        <button type="submit" name="submit" class="btn btn-primary">Pay</button>
                      </div>
                    </div>
                  </div>
                {{-- <div class="content py-3">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="firstname">Firstname</label>
                        <input id="firstname" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <input id="lastname" type="text" class="form-control">
                      </div>
                    </div>
                  </div>
                  <!-- /.row-->
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="company">Company</label>
                        <input id="company" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="street">Street</label>
                        <input id="street" type="text" class="form-control">
                      </div>
                    </div>
                  </div>
                  <!-- /.row-->
                  <div class="row">
                    <div class="col-md-6 col-lg-3">
                      <div class="form-group">
                        <label for="city">Company</label>
                        <input id="city" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="form-group">
                        <label for="zip">ZIP</label>
                        <input id="zip" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="form-group">
                        <label for="state">State</label>
                        <select id="state" class="form-control"></select>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="form-group">
                        <label for="country">Country</label>
                        <select id="country" class="form-control"></select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="phone">Telephone</label>
                        <input id="phone" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="text" class="form-control">
                      </div>
                    </div>
                  </div>
                  <!-- /.row-->
                </div> --}}

              </form>
            </div>
            <!-- /.box-->
          </div>
          <!-- /.col-lg-9-->
          <div class="col-lg-3">
            <div id="order-summary" class="card">
              <div class="card-header">
                <h3 class="mt-4 mb-4">Order summary</h3>
              </div>
              <div class="card-body">
                <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>Order subtotal</td>
                        <th>$446.00</th>
                      </tr>
                      <tr>
                        <td>Shipping and handling</td>
                        <th>$10.00</th>
                      </tr>
                      <tr>
                        <td>Tax</td>
                        <th>$0.00</th>
                      </tr>
                      <tr class="total">
                        <td>Total</td>
                        <th>$456.00</th>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col-lg-3-->
        </div>
      </div>
    </div>
  </div>

@endsection


@section('scripts')
<script>
  function click_pill(target)
  {
    $("#pill-"+target+"").prev().removeClass('active');
    $("#"+target+"").prev().removeClass('active');
    $("#pill-"+target+"").next().removeClass('active');
    $("#"+target+"").next().removeClass('active');
    $("#pill-"+target+"").addClass('active');
    $("#"+target+"").addClass('active');
  }
</script>
@endsection
