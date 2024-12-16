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
            $table->index('property_id', 'product_properties_property_id_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_properties', function (Blueprint $table) {
            $table->dropIndex('product_properties_property_id_index');

        });
    }
};
