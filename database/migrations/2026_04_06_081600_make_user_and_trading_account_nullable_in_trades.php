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
        Schema::table('trades', function (Blueprint $table) {
            // Drop existing foreign key constraints
            $table->dropForeign(['user_id']);
            $table->dropForeign(['trading_account_id']);
            
            // Make columns nullable and add new constraints
            $table->foreignId('user_id')->nullable()->change();
            $table->foreignId('trading_account_id')->nullable()->change();
            
            // Re-add foreign key constraints with onDelete('set null')
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('trading_account_id')->references('id')->on('trading_accounts')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trades', function (Blueprint $table) {
            // Drop foreign key constraints
            $table->dropForeign(['user_id']);
            $table->dropForeign(['trading_account_id']);
            
            // Make columns not nullable again
            $table->foreignId('user_id')->nullable(false)->change();
            $table->foreignId('trading_account_id')->nullable(false)->change();
            
            // Re-add foreign key constraints with onDelete('cascade')
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('trading_account_id')->references('id')->on('trading_accounts')->onDelete('cascade');
        });
    }
};
