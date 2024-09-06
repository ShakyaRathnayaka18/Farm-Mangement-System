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
        Schema::create('inventory', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('item_name'); // Name of the item
            $table->string('item_type'); // Name of the item
            $table->integer('quantity'); // Quantity of the item
            $table->date('expiry_date')->nullable(); // Expiry date of the item
            $table->string('inventory_status')->default('In Stock');
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
