<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Role;

class AdminCreateDefault extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //
    $role = new Role();
    $role->id = 1;
    $role->name = 'user';
    $role->save();


    $role = new Role();
    $role->id = 2;
    $role->name = 'admin';
    $role->save();

    $adminUser = new User();
    $adminUser->username = 'Hoàng Sỹ Dũng';
    $adminUser->email = 'devhoangsydung1911@gmail.com';
    $adminUser->password = bcrypt('devhoangsydung1911');
    $adminUser->role_id = 2;
    $adminUser->save();
  }
}