<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('plant_tutorial_relations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plant_id')->constrained('plants')->onDelete('cascade');
            $table->foreignId('tutorial_id')->constrained('tutorials')->onDelete('cascade');
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->unique('plant_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plant_tutorial_relations');
    }
};
