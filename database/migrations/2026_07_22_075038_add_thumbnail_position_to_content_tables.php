<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->string('thumbnail_position')->default('center')->after('thumbnail');
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->string('thumbnail_position')->default('center')->after('thumbnail');
        });

        Schema::table('educational_materials', function (Blueprint $table) {
            $table->string('thumbnail_position')->default('center')->after('thumbnail');
        });
    }

    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn('thumbnail_position');
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('thumbnail_position');
        });

        Schema::table('educational_materials', function (Blueprint $table) {
            $table->dropColumn('thumbnail_position');
        });
    }
};