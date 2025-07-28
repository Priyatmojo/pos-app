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
        Schema::table('users', function (Blueprint $table) {
            // Hanya hapus jika kolomnya ada, untuk mencegah error
            if (Schema::hasColumn('users', 'outlet_id')) {
                // Hapus foreign key constraint terlebih dahulu
                $table->dropForeign(['outlet_id']);
                // Hapus kolomnya
                $table->dropColumn('outlet_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambahkan kembali kolomnya jika migrasi di-rollback
            $table->foreignId('outlet_id')->nullable()->after('role')->constrained('outlets')->onDelete('set null');
        });
    }
};
