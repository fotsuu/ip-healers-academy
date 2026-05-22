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
        Schema::table('plants', function (Blueprint $table) {
            $table->text('preparation_methods_tagakaulo')->nullable()->after('preparation_methods');
            $table->text('preparation_methods_bagobo')->nullable()->after('preparation_methods_tagakaulo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plants', function (Blueprint $table) {
            $table->dropColumn(['preparation_methods_tagakaulo', 'preparation_methods_bagobo']);
        });
    }
};