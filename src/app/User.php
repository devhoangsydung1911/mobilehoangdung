<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
  use Notifiable;

  protected $dateFormat   = 'Y-m-d H:i:s';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

  protected $fillable = [
    'username', 'email', 'password', 'password_confirm', 'google_id', 'facebook_id'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  public function roles()
  {
    return $this->belongsTo('App\Model\Role', 'role_id');
  }
  public function orders()
  {
    return $this->hasMany('App\Models\Order');
  }

  public function carts()
  {
    return $this->hasMany('App\Models\Cart');
  }
}
