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
         $table->string('role')->default('admin_jurusan')->after('email');
         $table->foreignId('jurusan_id')
               ->after('role')
               ->nullable()
               ->constrained('jurusans') 
               ->nullOnDelete();        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['jurusan_id']);

            $table->dropColumn([
                'role',
                'jurusan_id',
            ]);
        });
    }
};
