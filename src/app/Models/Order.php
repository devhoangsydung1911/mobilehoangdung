<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
  //
  protected $fillable = [
    'user_id',
    'name',
    'email',
    'phone_number',
    'note',
    'order_date',
    'status',
    'address',
    'total_money',
  ];

  public function user()
  {
    return $this->belongsTo('App\User', 'user_id');
  }

  public function carts()
  {
    return $this->hasMany('App\Models\Cart');
  }
}