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
        Schema::table('products', function (Blueprint $table) {
            $table->index('mileage', 'products_mileage_index');
            $table->index(['name', 'price', 'mileage'], 'products_name_price_mileage_index');
            $table->dropIndex('products_name_price_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex('products_mileage_index');
            $table->dropIndex('products_name_price_mileage_index');
            $table->index(['name', 'price'],'products_name_price_index');
        });
    }
};
