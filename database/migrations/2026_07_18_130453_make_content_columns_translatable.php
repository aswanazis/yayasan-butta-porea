<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // ===== PROGRAMS =====
        Schema::table('programs', function (Blueprint $table) {
            $table->json('name_new')->nullable()->after('name');
            $table->json('excerpt_new')->nullable()->after('excerpt');
            $table->json('description_new')->nullable()->after('description');
        });

        DB::table('programs')->orderBy('id')->each(function ($row) {
            DB::table('programs')->where('id', $row->id)->update([
                'name_new' => json_encode(['id' => $row->name]),
                'excerpt_new' => $row->excerpt ? json_encode(['id' => $row->excerpt]) : null,
                'description_new' => $row->description ? json_encode(['id' => $row->description]) : null,
            ]);
        });

        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn(['name', 'excerpt', 'description']);
        });
        Schema::table('programs', function (Blueprint $table) {
            $table->renameColumn('name_new', 'name');
            $table->renameColumn('excerpt_new', 'excerpt');
            $table->renameColumn('description_new', 'description');
        });

        // ===== CATEGORIES =====
        Schema::table('categories', function (Blueprint $table) {
            $table->json('name_new')->nullable()->after('name');
        });

        DB::table('categories')->orderBy('id')->each(function ($row) {
            DB::table('categories')->where('id', $row->id)->update([
                'name_new' => json_encode(['id' => $row->name]),
            ]);
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('name');
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->renameColumn('name_new', 'name');
        });

        // ===== ARTICLES =====
        Schema::table('articles', function (Blueprint $table) {
            $table->json('title_new')->nullable()->after('title');
            $table->json('excerpt_new')->nullable()->after('excerpt');
            $table->json('content_new')->nullable()->after('content');
        });

        DB::table('articles')->orderBy('id')->each(function ($row) {
            DB::table('articles')->where('id', $row->id)->update([
                'title_new' => json_encode(['id' => $row->title]),
                'excerpt_new' => $row->excerpt ? json_encode(['id' => $row->excerpt]) : null,
                'content_new' => json_encode(['id' => $row->content]),
            ]);
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn(['title', 'excerpt', 'content']);
        });
        Schema::table('articles', function (Blueprint $table) {
            $table->renameColumn('title_new', 'title');
            $table->renameColumn('excerpt_new', 'excerpt');
            $table->renameColumn('content_new', 'content');
        });
    }

    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->string('name')->change();
            $table->text('excerpt')->nullable()->change();
            $table->longText('description')->nullable()->change();
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->string('name')->change();
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->string('title')->change();
            $table->text('excerpt')->nullable()->change();
            $table->longText('content')->change();
        });
    }
};