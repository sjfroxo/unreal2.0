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
        Schema::table('properties_list', function (Blueprint $table) {
            $table->index('value', 'properties_list_value_index');
            $table->index(['property_id', 'value'], 'properties_list_property_id_value_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties_list', function (Blueprint $table) {
            $table->dropIndex('properties_list_value_index');
            $table->dropIndex('properties_list_property_id_value_index');
        });
    }
};
