<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Brand;
use App\Category;

use Illuminate\Support\Facades\Hash;
use Cart;

class FrontController extends Controller
{
    public function index()
    {
      return view('index' , [
        'title' => 'Ecommerce',
        'parents' => Category :: where('parent_id' , 0)->limit(4)->get(),
        'categories' => Category :: where('parent_id' , '!=' , 0)->get(),
        'brands' => Brand :: limit(5)->get(),
        'hotties' => Product :: orderBy('created_at' , 'desc')->limit(8)->get(),
      ]);
    }

    public function category($category_id)
    {
      if ($category_id == 0) {
        $products = Product ::paginate(6);
      }
      else {
        $products = Category :: find($category_id)->all_products();
      }


      return view('category' , [
        'title' => 'Category',
        'category' => Category :: find($category_id),
        'brands' => Brand :: all(),
        'parents' => Category :: where('parent_id' , 0)->get(),
        'categories' => Category :: where('parent_id' , '!=' , 0)->orderBy('created_at')->get(),
        'products' => $products,
      ]);
    }

    public function detail($product_id)
    {
      return view('detail' , [
        'title' => 'Product detail',
        'product' => Product :: find($product_id),
        'more_products' => Product :: orderBy('created_at')->limit(3)->get(),
        'brands' => Brand :: all(),
        'parents' => Category :: where('parent_id' , 0)->get(),
      ]);
    }



    public function basket()
    {
      if (Cart :: isempty()) {
        return redirect()->route('category' , ['id' => 0]);
      }
      return view('basket' , [
        'title' => 'Product detail',
        'more_products' => Product :: orderBy('created_at')->limit(3)->get(),
        'brands' => Brand :: all(),
        'parents' => Category :: where('parent_id' , 0)->get(),
      ]);
    }

    public function add_to_cart($product_id)
    {

      $product = Product :: find($product_id);
      Cart :: add([
        'id' => $product->id,
        'name' => $product->name,
        'price' => 200,
        'quantity' => 1,
        'attributes' => [
          'model' => $product,
        ]
      ]);

      return redirect()->back()->withInput();
    }

    public function incr_cart_item($id)
    {
      Cart :: update($id , [
        'quantity' => 1,
      ]);

      return redirect()->route('basket');

    }

    public function decr_cart_item($id)
    {

      Cart :: update($id , [
        'quantity' => -1,
      ]);

      return redirect()->route('basket');
    }

    public function remove_cart_item($id)
    {
      Cart :: remove($id);
      return redirect()->route('basket');
    }


    public function checkout()
    {
      if (Cart :: isEmpty()) {
        return redirect()->route('basket')->with('info' , 'Cart is empty!');
      }
      return view('checkout' , [
        'title' => 'checkout',
        'brands' => Brand :: all(),
        'parents' => Category :: where('parent_id' , 0)->get(),
      ]);
    }


    public function register()
    {
      return view('register' , [
        'title' => 'Customer registration',
        'brands' => Brand :: all(),
        'parents' => Category :: where('parent_id' , 0)->get(),
      ]);
    }

    public function register_user(Request $request)
    {
      $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
      ]);

      $u = User :: create([
          'name' => $request->name,
          'email' => $request->email,
          'pasword' => Hash :: make($request->password),
          'role_id' => Role :: where('name' , 'user')
      ]);
    }


}
