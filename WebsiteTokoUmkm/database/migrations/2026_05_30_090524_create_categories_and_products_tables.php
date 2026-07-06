<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesAndProductsTables extends Migration
{
    public function up()
    {
        // 1. Tabel Kategori Produk (Tetap utuh seperti bawaanmu)
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        // 2. Tabel Produk Jualan
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            
            // Ditambah ->nullable() agar tidak eror jika form kamu belum mengirim ID kategori
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('cascade');
            
            // Kolom baru tambahan agar sinkron dengan form admin & controller kamu
            $table->string('category_name'); 
            
            // Kolom bawaan asli kamu (Tetap utuh tidak diganti)
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('price');
            $table->integer('stock')->default(0);
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
    }
}
