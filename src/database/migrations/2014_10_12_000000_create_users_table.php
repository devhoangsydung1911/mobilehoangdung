<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('username');
      $table->string('email');
      $table->string('phone_number')->nullable();
      $table->timestamp('email_verified_at')->nullable();
      $table->string('password')->default(bcrypt('mobilestore'));
      $table->integer('role_id')->default(1);
      $table->string('facebook_id')->nullable();
      $table->string('google_id')->nullable();
      $table->rememberToken();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('users');
  }
}