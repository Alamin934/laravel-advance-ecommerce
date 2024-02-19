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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade'); 
            $table->string('customer_name'); 
            $table->string('customer_email')->nullable(); 
            $table->string('customer_phone'); 
            $table->string('address'); 
            $table->string('city'); 
            $table->string('state'); 
            $table->string('postal_code'); 
            $table->string('country')->nullable(); 
            $table->decimal('sub_total', 8, 2); 
            $table->decimal('total', 8, 2); 
            $table->string('coupon_code')->nullable(); 
            $table->string('coupon_discount')->nullable(); 
            $table->string('coupon_after_discount')->nullable(); 
            $table->string('payment_type'); 
            $table->string('payment_status')->default('pending'); 
            $table->string('tax')->nullable(); 
            $table->string('shipping_charge')->nullable(); 
            $table->string('order_status')->default('pending'); 
            $table->string('order_id')->unique(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
