<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\User;

class CartController extends Controller
{
  public function addToCart(Request $request)
  {
    if (!$request->get('product_id')) {
      return ['items' => Cart::where('user_id', auth()->user()->id)->sum('quantity')];
    }
    $user = User::where('id', $request->get('user_id'))->first();
    $product = Product::where('id', $request->get('product_id'))->first();
    $cart = new Cart();
    $productFoundInCart = $cart->where('product_id', $request->get('product_id'))->pluck('id');
    if ($productFoundInCart->isEmpty()) {
      $cart->price = $product->price;
      $cart->user_id = $user->id;
      $cart->product_id = $product->id;
      $cart->quantity = 1;
      $cart->save();
    } else {
      $cart->where('product_id', $request->product_id)->increment('quantity');
    }
    // $userItems = Cart::where('user_id', auth()->user()->id)->sum('quantity');
    return ['items' => Cart::where('user_id', auth()->user()->id)->sum('quantity')];
  }

  public function getCartItemForCheckout()
  {
    $cartItems = Cart::with('product')->where('user_id', auth()->user()->id)->get();
    $finalData = [];
    if (isset($cartItems)) {
      foreach ($cartItems as $cartItem) {
        if ($cartItem->product) {
          foreach ($cartItem->product as $cartProduct) {
            if ($cartProduct->id == $cartItem->product_id) {
              $finalData[$cartItem->product_id]['id'] = $cartProduct->id;
              $finalData[$cartItem->product_id]['title'] = $cartProduct->title;
              $finalData[$cartItem->product_id]['price'] = $cartItem->price;
              $finalData[$cartItem->product_id]['cart_id'] = $cartItem->id;
              $finalData[$cartItem->product_id]['thumbnail'] = $cartProduct->thumbnail;
              $finalData[$cartItem->product_id]['quantity'] = $cartItem->quantity;
              $finalData[$cartItem->product_id]['price'] = $cartItem->price;
              $finalData[$cartItem->product_id]['created'] = $cartItem->created_at;
              $finalData[$cartItem->product_id]['total_money'] = $cartItem->price * $cartItem->quantity;
            }
          }
        }
      }
      return response()->json($finalData);
    }
  }

  public function getCartItemForChecked()
  {
    $cartItems = Cart::with('product')->onlyTrashed()->where('user_id', auth()->user()->id)->get();
    $finalData = [];
    if (isset($cartItems)) {
      foreach ($cartItems as $cartItem) {
        if ($cartItem->product) {
          foreach ($cartItem->product as $cartProduct) {
            if ($cartProduct->id == $cartItem->product_id) {
              $finalData[$cartItem->product_id]['id'] = $cartProduct->id;
              $finalData[$cartItem->product_id]['title'] = $cartProduct->title;
              $finalData[$cartItem->product_id]['price'] = $cartItem->price;
              $finalData[$cartItem->product_id]['cart_id'] = $cartItem->id;
              $finalData[$cartItem->product_id]['thumbnail'] = $cartProduct->thumbnail;
              $finalData[$cartItem->product_id]['quantity'] = $cartItem->quantity;
              $finalData[$cartItem->product_id]['price'] = $cartItem->price;
              $finalData[$cartItem->product_id]['created'] = $cartItem->created_at;
              $finalData[$cartItem->product_id]['total_money'] = $cartItem->price * $cartItem->quantity;
            }
          }
        }
      }
      return response()->json($finalData);
    }
  }

  public function deleteCartItem(Request $request)
  {
    Cart::where('id', $request->get('cart_id'))->delete();
    return ['items' => Cart::where('user_id', auth()->user()->id)->sum('quantity')];
  }
}