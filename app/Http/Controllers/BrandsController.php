<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Product;

class BrandsController extends Controller
{

  public function __construct()
  {
    $this->middleware('admin');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.brands.index' , [
        'title' => 'Brands' , 'brands' => Brand :: all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required|unique:brands,name',
      ]);

      $data = Brand :: create([
        'name' => $request->name,
      ]);

      if ($data) {
        return redirect()->route('brands.index')->with('success' , 'Brand created');
      }

      return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $brand = Brand :: find($id);

      return view('admin.brands.edit' , [
        'title' => 'Edit Brand' , 'brand' => $brand,
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required|unique:brands,name']);
        $data = Brand :: where('id' , $id)->update([
          'name' => $request->name,
        ]);

        if ($data) {
          return redirect()->route('brands.index')->with('success' , 'Brand Updated');
        }

        return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $brand = Brand :: find($id);

      // // delete products of this brands
      // foreach ($brand->products as $p) {
      //   unlink(implode('/', explode('\\', public_path())).'/uploads/products/'.$p->featured);
      //   Product :: destroy($p->id);
      // }

      // check if brand has Products
      if ($brand->products->inNotEmpty()) {
        return redirect()->route('brands.index')->with('error' , 'This brand has products.You can\'t delete it');
      }

      if ($brand->delete()) {
        return redirect()->route('brands.index')->with('success' , 'Brand deleted');
      }

      return redirect()->back()->withInput();
    }
}
