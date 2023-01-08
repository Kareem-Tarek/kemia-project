<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            // $table->id();
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('keywords')->nullable();
            $table->decimal('price');
            $table->decimal('discount')->nullable();
            $table->string('image');
            $table->string('category_id');
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
        Schema::dropIfExists('products');
    }
};
