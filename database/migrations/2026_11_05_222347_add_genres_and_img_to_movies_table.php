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
        $hasGenres = Schema::hasColumn('movies', 'genres');
        $hasImage = Schema::hasColumn('movies', 'img');

        Schema::table('movies', function (Blueprint $table) use ($hasGenres, $hasImage) {
            if (! $hasGenres) {
                $table->string('genres')->nullable()->default('sconosciuto');
            }

            if (! $hasImage) {
                $table->string('img')->nullable()->default('/media/poster/default.jpg');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {}
};
