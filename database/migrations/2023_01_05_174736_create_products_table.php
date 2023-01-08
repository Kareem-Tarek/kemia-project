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
            $table->bigIncrements('id');
            $table->string('title', '600');
            $table->longText('description')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('keywords')->nullable();
            $table->decimal('price', '65');
            $table->decimal('discount')->nullable();
            $table->string('image');
            $table->string('category_id');
            $table->enum('status',['available','unavailable'])->default('available');
            $table->timestamps();
            $table->softDeletes();
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
