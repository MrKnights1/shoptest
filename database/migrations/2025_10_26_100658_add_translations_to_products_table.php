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
            // Add translation columns for Estonian, English, and Russian
            $table->string('name_et')->nullable()->after('name');
            $table->string('name_en')->nullable()->after('name_et');
            $table->string('name_ru')->nullable()->after('name_en');
            $table->text('description_et')->nullable()->after('description');
            $table->text('description_en')->nullable()->after('description_et');
            $table->text('description_ru')->nullable()->after('description_en');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['name_et', 'name_en', 'name_ru', 'description_et', 'description_en', 'description_ru']);
        });
    }
};
