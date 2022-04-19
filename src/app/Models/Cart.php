<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
  use SoftDeletes;
  protected $fillable = [
    'user_id',
    'product_id',
    'price',
    'order_id'
  ];
  public function users()
  {
    return $this->belongsTo('App\User', 'user_id');
  }
  public function product()
  {
    return $this->hasMany(Product::class, 'id', 'product_id');
  }
}