<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tutorials', function (Blueprint $table) {
            if (!Schema::hasColumn('tutorials', 'image')) {
                $table->string('image')->nullable()->after('link');
            }
            if (!Schema::hasColumn('tutorials', 'description')) {
                $table->text('description')->nullable()->after('image');
            }
            if (!Schema::hasColumn('tutorials', 'category')) {
                $table->string('category')->nullable()->after('description');
            }
            if (!Schema::hasColumn('tutorials', 'difficulty')) {
                $table->string('difficulty')->nullable()->after('category');
            }
        });
    }

    public function down(): void
    {
        Schema::table('tutorials', function (Blueprint $table) {
            if (Schema::hasColumn('tutorials', 'image')) {
                $table->dropColumn('image');
            }
            if (Schema::hasColumn('tutorials', 'description')) {
                $table->dropColumn('description');
            }
            if (Schema::hasColumn('tutorials', 'category')) {
                $table->dropColumn('category');
            }
            if (Schema::hasColumn('tutorials', 'difficulty')) {
                $table->dropColumn('difficulty');
            }
        });
    }
}; 