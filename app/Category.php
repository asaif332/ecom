<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function parent()
    {
      return $this->belongsTo('App\Category' , 'parent_id');
    }

    public function categories()
    {
      return $this->hasMany('App\Category' , 'parent_id' , 'id');
    }

    public function products()
    {
      return $this->belongsToMany('App\Product');
    }


    // get all the parents
  public function h_parents(){
    $obj = $this;
      $array = [$obj];
      while($obj->parent_id){
          $array[] = $obj->parent;
          $obj = $obj->parent;
      }
      return array_reverse($array);
  }

    // get all child categories
    public function all_categories()
    {
      if ($this->categories->isNotEmpty()) {
        foreach ($this->categories as $cat) {
          $cat->all_categories();
        }
      }
      global $array;
      $array[] = $this;

      return $array;
    }


    // get all products under the category
    public function all_products()
    {
      $arr = [];

      foreach ($this->all_categories() as $cat) {
        foreach ($cat->products as $product) {
          $arr[$product->id] = $product;
        }
      }
    
      return $arr;
    }


    // get the hierarichal name of the parents
    public function h_name()
    {
      $string = '';
      foreach ($this->h_parents() as $p) {
        $string .= $p->name.' -> ';
      }

      $string = rtrim($string , ' >- ');

      return $string;

    }
}
