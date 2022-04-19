<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\Cart;
use App\User;
use PDF;

class OrderController extends Controller
{
  /** Lưu thông tin địa chỉ nhận đơn hàng */
  public function postInfo(Request $request)
  {
    $province = Province::where('id', $request->province)->first();
    $district = District::where('id', $request->district)->first();
    $ward = Ward::where('id', $request->ward)->first();
    Order::create([
      'user_id' => $request->user_id,
      'name' => $request->name,
      'email' => $request->email,
      'phone_number' => $request->phone_number,
      'address' => "$ward->name - $district->name - $province->name",
      'note' => $request->note,
      'total_money' => $request->total_money,
    ]);

    $order_id = Order::where('user_id', $request->user_id)->value('id');
    $checks = Cart::where('user_id', $request->user_id)->get();
    if (isset($checks)) {
      foreach ($checks as $check) {
        if ($check->user_id == $request->user_id) {
          Cart::where('user_id', $check->user_id)->update([
            'order_id' => $order_id
          ]);
        }
        if ($check->user_id == $request->user_id) {
          Cart::where('user_id', $check->user_id)->delete();
        }
      }
    }
    return;
  }

  public function getOrder()
  {
    $orders = Order::all();
    // return response()->json($orders);
    return view('adminlte.order', ['orders' => $orders]);
  }

  public function getUserOrder()
  {
    $user = Order::with('user')->where('user_id', auth()->user()->id)->first();
    return response()->json($user);
  }

  public function exportPDF()
  {
    $user = Order::with('user')->where('user_id', auth()->user()->id)->first();

    $cartItems = Cart::with('product')->onlyTrashed()->where('user_id', auth()->user()->id)->get();
    $finalData = [];
    if (isset($cartItems)) {
      foreach ($cartItems as $cartItem) {
        if ($cartItem->product) {
          foreach ($cartItem->product as $cartProduct) {
            if ($cartProduct->id == $cartItem->product_id) {
              $finalData[$cartItem->product_id]['id'] = $cartProduct->id;
              $finalData[$cartItem->product_id]['title'] = $cartProduct->title;
              $finalData[$cartItem->product_id]['price'] = $this->currency_format($cartItem->price);
              $finalData[$cartItem->product_id]['cart_id'] = $cartItem->id;
              $finalData[$cartItem->product_id]['thumbnail'] = $cartProduct->thumbnail;
              $finalData[$cartItem->product_id]['quantity'] = $cartItem->quantity;
              $finalData[$cartItem->product_id]['price'] = $this->currency_format($cartItem->price);
              $finalData[$cartItem->product_id]['created'] = $cartItem->created_at;
              $finalData[$cartItem->product_id]['total_money'] = $this->currency_format($cartItem->price * $cartItem->quantity);
            }
          }
        }
      }
    }
    view()->share([
      'user' => $user,
      'finalData' => $finalData
    ]);
    $pdf = PDF::loadview('pdf');
    return $pdf->download('bill.pdf');
  }
  function currency_format($number, $suffix = ' VND')
  {
    if (!empty($number)) {
      return number_format($number, 0, ',', '.') . "{$suffix}";
    }
  }
}