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
        Schema::create('domains', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name')->unique(); // Domain name
            $table->string('status')->default('Listed'); // Status (e.g., Listed, On Hold)
            $table->boolean('lease_to_own')->default(false); // Lease to Own (On/Off)
            $table->decimal('buy_now_price', 10, 2)->nullable(); // Buy Now Price
            $table->decimal('floor_price', 10, 2)->nullable(); // Floor Price
            $table->decimal('minimum_offer', 10, 2)->nullable(); // Minimum Offer
            $table->string('sale_lander')->default('Request Price'); // Sale Lander
            $table->integer('views')->default(0); // Views
            $table->timestamps(); // Created and Updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domains');
    }
};
