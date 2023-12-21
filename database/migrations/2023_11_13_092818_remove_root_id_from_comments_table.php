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
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('comments_root_id_foreign');
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn('root_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->unsignedBigInteger('root_id')->nullable();
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('root_id')->references('id')->on('comments');
        });
    }
};
