<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;
use App\Models\Product;

class Categories extends Controller
{

  public function getAllCategory()
  {
    $listCategory = Category::all();
    return view('adminlte.categories')->with('listCategory', $listCategory);
  }

  public function setAddCategory(Request $request)
  {
    $category = new Category();
    $category->name = $request->name;
    if (!empty($category->name)) {
      $category->save();
      return redirect()->back();
    } else {
      return redirect()->back();
    }
  }
}