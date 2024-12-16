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
        Schema::table('product_properties', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('property_id')->constrained('properties')->onUpdate('cascade')->onDelete('cascade');
//            $table->index(['product_id', 'property_id', 'value'], 'product_properties_product_id_property_id_value_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_properties', function (Blueprint $table) {
            $table->dropConstrainedForeignId('product_id');
            $table->dropConstrainedForeignId('property_id');
//            $table->dropIndex('product_properties_product_id_property_id_value_index');
        });
    }
};
