<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('project_akhirs', function (Blueprint $table) {
            if (! Schema::hasColumn('project_akhirs', 'title')) {
                $table->string('title')->after('id');
            }
            if (! Schema::hasColumn('project_akhirs', 'description')) {
                $table->text('description')->nullable()->after('title');
            }
            if (! Schema::hasColumn('project_akhirs', 'tags')) {
                $table->json('tags')->nullable()->after('description');
            }
            if (! Schema::hasColumn('project_akhirs', 'icon')) {
                $table->string('icon')->nullable()->after('tags');
            }
            if (! Schema::hasColumn('project_akhirs', 'image')) {
                $table->string('image')->nullable()->after('icon');
            }
            if (! Schema::hasColumn('project_akhirs', 'background_gradient')) {
                $table->string('background_gradient')->nullable()->after('image');
            }
            if (! Schema::hasColumn('project_akhirs', 'url')) {
                $table->string('url')->nullable()->after('background_gradient');
            }
            if (! Schema::hasColumn('project_akhirs', 'is_featured')) {
                $table->boolean('is_featured')->default(false)->after('url');
            }
            if (! Schema::hasColumn('project_akhirs', 'is_published')) {
                $table->boolean('is_published')->default(true)->after('is_featured');
            }
            if (! Schema::hasColumn('project_akhirs', 'sort_order')) {
                $table->unsignedInteger('sort_order')->default(0)->after('is_published');
            }
        });
    }

    public function down(): void
    {
        Schema::table('project_akhirs', function (Blueprint $table) {
            foreach ([
                'title',
                'description',
                'tags',
                'icon',
                'image',
                'background_gradient',
                'url',
                'is_featured',
                'is_published',
                'sort_order',
            ] as $column) {
                if (Schema::hasColumn('project_akhirs', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
