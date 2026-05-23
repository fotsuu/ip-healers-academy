<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Adds tribe-specific tutorial video link fields to the tutorials table.
     * The existing 'link' field serves as the general tutorial video link.
     * This migration adds:
     * - link_tagakaulo: Tagakaulo tribe-specific tutorial video link
     * - link_bagobo: Bagobo tribe-specific tutorial video link
     */
    public function up(): void
    {
        Schema::table('tutorials', function (Blueprint $table) {
            // Note: 'link' already exists from create_tutorials_table migration
            // and serves as the 'general' tutorial video link field
            
            // Add Tagakaulo tribe-specific tutorial video link
            $table->string('link_tagakaulo')
                  ->nullable()
                  ->after('link')
                  ->comment('Tagakaulo tribe-specific tutorial video link');
            
            // Add Bagobo tribe-specific tutorial video link
            $table->string('link_bagobo')
                  ->nullable()
                  ->after('link_tagakaulo')
                  ->comment('Bagobo tribe-specific tutorial video link');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tutorials', function (Blueprint $table) {
            $table->dropColumn([
                'link_tagakaulo',
                'link_bagobo'
            ]);
        });
    }
};