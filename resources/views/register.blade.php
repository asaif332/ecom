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
                <li aria-current="page" class="breadcrumb-item active">New account / Sign in</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6">
            <div class="box">
              <h1>New account</h1>
              <p class="lead">Not our registered customer yet?</p>
              <p>With registration with us new world of fashion, fantastic discounts and much more opens to you! The whole process will not take you more than a minute!</p>
              <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>
              <hr>
              <form action="{{route('customer.add')}}" method="post">
                @csrf
                <div class="form-group">
                  <label for="name">Name</label>
                  <input id="name" type="text" name="name" value="{{old('name')}}" class="form-control">
                  <span class="text-danger">{{$errors->first('name')}}</span>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input id="email" type="text" name="email" value="{{old('email')}}" class="form-control">
                  <span class="text-danger">{{$errors->first('email')}}</span>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input id="password" type="password" name="password" class="form-control">
                  <span class="text-danger">{{$errors->first('password')}}</span>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="box">
              <h1>Login</h1>
              <p class="lead">Already our customer?</p>
              <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
              <hr>
              <form action="customer-orders.html" method="post">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input id="email" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input id="password" type="password" class="form-control">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection


@section('scripts')

@endsection
