<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Galery;
use App\Models\Order;
use App\User;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
  public function setAddProduct(Request $request)
  {
    if ($request->has('thumbnail')) {
      $file = $request->thumbnail;
      $fileExt = $file->getClientOriginalExtension();
      $fileName = uniqid('', true) . '.' . $fileExt;
      $file->move(public_path('uploads/products'), $fileName);
    }

    Product::create([
      'title' => $request->title,
      'desc' => $request->desc,
      'price' => $request->price,
      'discount' => $request->discount,
      'thumbnail' => $fileName,
      'categories_id' => $request->categories_id,
    ]);
    return redirect()->back();
  }
  public function getAllProduct()
  {
    $allProduct = Product::all();
    return view('adminlte.product')->with('allProduct', $allProduct);
  }

  public function editproduct($id)
  {
    return view('adminlte.edit', [
      'editProduct' => Product::find($id),
      'listCate' => Category::all(),
    ]);
  }

  public function updateproduct(Request $request, $id)
  {
    $product = Product::find($id);
    if ($request->has('thumbnail')) {
      $file = $request->thumbnail;
      $fileExt = $file->getClientOriginalExtension();
      $fileName = uniqid('', true) . '.' . $fileExt;
      File::delete(public_path('uploads/products/') . $product->thumbnail);
      $file->move(public_path('uploads/products'), $fileName);
    } else {
      $fileName = $product->thumbnail;
    }
    Product::find($id)->update([
      'title' => $request->title,
      'desc' => $request->desc,
      'discount' => $request->discount,
      'price' => $request->price,
      'thumbnail' => $fileName,
      'categories_id' => $request->categories_id,
    ]);

    return redirect()->route('product');
  }

  public function deleteproduct($id)
  {
    Product::find($id)->delete();
    return redirect()->back();
  }

  //API
  /** Get Mobile */
  public function apiGetAllMobile()
  {
    $products = Product::all()->where('categories_id', 1);
    return response()->json($products);
  }
  /** Get Laptop */
  public function apiGetAllLaptop()
  {
    $products = Product::all()->where('categories_id', 2);
    return response()->json($products);
  }
  /** Get Phụ kiện */
  public function apiGetAllHeadPhone()
  {
    $products = Product::all()->where('categories_id', 3);
    return response()->json($products);
  }
  /** Get đồng hồ */
  public function apiGetAllWatch()
  {
    $products = Product::all()->where('categories_id', 4);
    return response()->json($products);
  }

  public function getOneProduct(Request $request)
  {
    $products = Product::findOrFail($request->id);
    return response()->json($products);
  }
}