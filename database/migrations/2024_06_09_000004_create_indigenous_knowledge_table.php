<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('indigenous_knowledge', function (Blueprint $table) {
            $table->id();
            $table->foreignId('healer_id')->constrained('healers')->onDelete('cascade');
            $table->string('practice_name');
            $table->string('cultural_significance');
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('indigenous_knowledge');
    }
}; 