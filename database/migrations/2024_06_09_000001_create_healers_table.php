<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('healers', function (Blueprint $table) {
            $table->id();
            $table->string('healer_name');
            $table->string('ethnic_group');
            $table->string('phone')->nullable();
            $table->string('location')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->string('specialization')->nullable();
            $table->integer('experience_years')->nullable();
            $table->string('languages')->nullable();
            $table->text('about')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('healers');
    }
}; 