<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
  //
  use  SoftDeletes;

  protected $fillable = [
    'title',
    'desc',
    'price',
    'discount',
    'thumbnail',
    'categories_id'
  ];
  public function categories()
  {
    return $this->belongsTo('App\Models\Category', 'categories_id');
  }
}