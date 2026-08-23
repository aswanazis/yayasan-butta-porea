<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('foundation_profile', function (Blueprint $table) {
            $table->id();
            $table->json('profile_text')->nullable();
            $table->json('commitment_items')->nullable();
            $table->timestamps();
        });

        // Singleton: selalu hanya ada 1 baris (id = 1), supaya admin panel
        // langsung punya data untuk diedit tanpa perlu tombol "create".
        DB::table('foundation_profile')->insert([
            'id' => 1,
            'profile_text' => json_encode(['id' => '', 'en' => '']),
            'commitment_items' => json_encode(['id' => [], 'en' => []]),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('foundation_profile');
    }
};
