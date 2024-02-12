<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('sub_category_id')->constrained()->nullable();
            $table->foreignId('child_category_id')->constrained()->nullable();
            $table->foreignId('brand_id')->constrained()->nullable();
            $table->string('title');
            $table->longText('description');
            $table->string('thumbnail');
            $table->string('images')->nullable();
            $table->string('code');
            $table->string('unit')->nullable();
            $table->string('tags')->nullable();
            $table->decimal('purchase_price', 8, 2);
            $table->decimal('selling_price', 8, 2)->nullable();
            $table->decimal('discount_price', 8, 2)->nullable();
            $table->string('video')->nullable();
            $table->string('stock_quantity');
            $table->integer('product_views')->default(0);
            $table->string('home_banner')->nullable();
            $table->string('home_slider')->nullable();
            $table->string('featured')->nullable();
            // $table->string('today_deal')->nullable();
            // $table->string('flash_deal_id')->nullable();
            // $table->string('cash_on_delivery')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
