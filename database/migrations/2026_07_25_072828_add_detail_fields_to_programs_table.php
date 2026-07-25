<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->json('process_steps')->nullable()->after('description');
            $table->json('impact_items')->nullable()->after('process_steps');
            $table->json('impact_stats')->nullable()->after('impact_items');
            $table->string('impact_image_1')->nullable()->after('impact_stats');
            $table->string('impact_image_2')->nullable()->after('impact_image_1');
        });
    }

    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn(['process_steps', 'impact_items', 'impact_stats', 'impact_image_1', 'impact_image_2']);
        });
    }
};