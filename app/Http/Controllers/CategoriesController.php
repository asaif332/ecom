<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index' , [
                                  'title' => 'Categories' ,
                                  'cats' => Category :: orderBy('parent_id')->get(),
                                ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.categories.create' , [
                                'title' => 'Create Category' ,
                                'cats' => Category :: orderBy('parent_id')->get(),
                              ]);
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
          'name' => 'required',
          'parent_id' => 'required'
        ]);

        foreach ($request->parent_id as $id) {
          $request->validate([
            'name' => 'unique:categories,name,NULL,id,parent_id,'.$id,
          ]);
        }

        foreach ($request->parent_id as $id) {
          $data = Category :: create([
            'name' => $request->name,
            'parent_id' => $id,
          ]);
        }

        if ($data) {
          return redirect()->route('categories.index')->with('success' , 'Category created');
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
        $cat = Category :: find($id);

        return view('admin.categories.edit' , [
          'title' => 'Edit Category' , 'cat' => $cat,
          'cats' => Category :: orderBy('parent_id')->get(),
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
        'name' => 'required|unique:categories,name,'
      ]);

      $data = Category :: where('id' , $id)->update([
        'name' => $request->name,
      ]);

      if ($data) {
        return redirect()->route('categories.index')->with('success' , 'Category updated');
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
        $cat = Category :: find($id);
        // check if category is parent
        if ($cat->categories->isNotEmpty()) {
          return redirect()->route('categories.index')->with('error' , 'You cant delete parent category');
        }

        // check if category has products
        if ($cat->products->isNotEmpty()) {
          return redirect()->route('categories.index')->with('error' , 'First delete the category products');
        }

        // delete products of this brands
        // foreach ($cat->products as $p) {
        //   unlink(implode('/', explode('\\', public_path())).'/uploads/products/'.$p->featured);
        //   Product :: destroy($p->id);
        // }

        if ($cat->delete()) {
          return redirect()->route('categories.index')->with('success' , 'Category deleted');
        }

        return redirect()->back()->withInput();

    }
}
