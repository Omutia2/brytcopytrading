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
        Schema::table('trading_accounts', function (Blueprint $table) {
            // Add PENDING status to the enum
            $table->enum('status', ['PENDING', 'ACTIVE', 'INACTIVE', 'SUSPENDED'])->default('PENDING')->change();
            
            // Add approval fields
            $table->timestamp('approved_at')->nullable()->after('is_copy_trading_enabled');
            $table->foreignId('approved_by')->nullable()->constrained('users')->onDelete('set null')->after('approved_at');
            $table->text('rejection_reason')->nullable()->after('approved_by');
            $table->timestamp('rejected_at')->nullable()->after('rejection_reason');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trading_accounts', function (Blueprint $table) {
            $table->dropColumn(['approved_at', 'approved_by', 'rejection_reason', 'rejected_at']);
            
            // Revert status enum to original values
            $table->enum('status', ['ACTIVE', 'INACTIVE', 'SUSPENDED'])->default('ACTIVE')->change();
        });
    }
};
