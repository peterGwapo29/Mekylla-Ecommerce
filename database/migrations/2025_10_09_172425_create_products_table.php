<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->decimal('price', 10, 2);
        $table->decimal('old_price', 10, 2)->nullable();
        $table->string('image')->nullable();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('products');
}

};
