<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Product;
use App\Category;
use App\Brand;

class ProductsController extends Controller
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
        return view('admin.products.index' , [
        'title' => 'Products' , 'products' => Product :: all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create' , [
          'title' => 'Add Product',
          'brands' => Brand :: all(),
          'cats' => Category :: all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {//
      $request->validate([
        'name' => 'required|unique:products,name',
        'description' => 'required',
        'featured' => 'required|image|mimes:jpg,png,gif,jpeg',
        'brand_id' => 'required',
        'stock' => 'required|numeric',
        'category_id' => 'required',
      ]);
      $newname = '';
      if ($request->hasFile('featured')) {
        $image = $request->file('featured');
        $newname = time().$image->getClientOriginalName();
        $img = Image :: make($image)->resize(450,600);
        $img->save('uploads/products/'. $newname);
      }

      $product = Product :: create([
        'name' => $request->name,
        'description' => $request->description,
        'featured' => $newname,
        'stock' => $request->stock,
        'brand_id' => $request->brand_id,
      ]);

      $product->categories()->attach($request->category_id);

      if ($product) {
        return redirect()->route('products.index')->with('success' , 'Product created');
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
      $product = Product :: find($id);

      return view('admin.products.edit' , [
        'title' => 'Edit Product' ,
        'product' => $product,
        'brands' => Brand :: all(),
        'cats' => Category :: all(),
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

      $request->validate([
        'name' => 'required|unique:products,name,'.$id,
        'description' => 'required',
        'stock' => 'required',
        'brand_id' => 'required',
      ]);

      $product = Product :: find($id);


      $newname = $product->featured;
      if ($request->hasFile('featured')) {
        $request->validate([
          'featured' => 'required|image|mimes:jpg,png,gif,jpeg',
        ]);

        try {
          unlink(implode('/', explode('\\', public_path())).'/uploads/products/'.$newname);
        } catch (\Exception $e) {

        }



        $image = $request->file('featured');
        $newname = time().$image->getClientOriginalName();
        $img = Image :: make($image)->resize(450,600);
        $img->save('uploads/products/'. $newname);
      }


      $data = Product :: where('id' , $id)->update([
        'name' => $request->name,
        'description' => $request->description,
        'featured' => $newname,
        'stock' => $request->stock,
        'brand_id' => $request->brand_id,
      ]);

      // $data->categories()->attach($request->category_id);
      $product->categories()->syncWithoutDetaching($request->category_id);

      if ($data) {
        return redirect()->route('products.index')->with('success' , 'Product Updated');
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
      $product = Product :: find($id);

      // detach from pivot
      $product->categories()->detach();

      // delete imageof product
      unlink(implode('/', explode('\\', public_path())).'/uploads/products/'.$product->featured);

      if ($product->delete()) {
        return redirect()->route('products.index')->with('success' , 'Product deleted');
      }

      return redirect()->back()->withInput();
    }


    public function product_cat_delete($product_id , $category_id)
    {
      $product = Product :: find($product_id);
      $product->categories()->detach($category_id);
      return redirect()->route('products.edit' , ['id' => $product_id]);
    }

}
