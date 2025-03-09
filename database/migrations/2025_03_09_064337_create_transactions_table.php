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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('phone');
            $table->string('external_id');
            $table->string('checkout_link');
            $table->integer('barcode_id')->constrained('barcodes')->onDelete('cascade');
            $table->string('payment_method')->nullable();
            $table->string('payment_status')->nullable();
            $table->integer('subtotal');
            $table->integer('ppn');
            $table->integer('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
