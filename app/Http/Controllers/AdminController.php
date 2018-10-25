<?php

namespace App\Http\Controllers;
use App\Role;
use App\User;
use App\Brand;
use App\Product;
use App\Category;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index' , [
          'brands' => Brand :: all(),
          'users' => User :: all(),
          'cats' => Category :: all(),
          'products' => Product :: all(),
        ]);
    }
}
