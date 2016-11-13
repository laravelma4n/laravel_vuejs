<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
  public function up() {
    Schema::create('clients', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->string('apepat');
      $table->string('apemat');
      $table->string('email');
      $table->timestamps();
    });
  }
  public function down() {
    Schema::drop('clients');
  }
}
