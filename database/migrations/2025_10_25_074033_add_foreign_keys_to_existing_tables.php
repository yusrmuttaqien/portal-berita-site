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
            $table->unsignedBigInteger('role_id')->default(1)->after('password');
            $table->foreign('role_id')->references('id_role')->on('roles')->onDelete('cascade');
        });

        Schema::table('artikel', function (Blueprint $table) {
            $table->unsignedBigInteger('kategori_id')->nullable()->after('slug');
            $table->unsignedBigInteger('penulis_id')->nullable()->after('kategori_id');

            $table->foreign('kategori_id')->references('id_kategori')->on('categories')->onDelete('set null');
            $table->foreign('penulis_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
        });

        Schema::table('artikel', function (Blueprint $table) {
            $table->dropForeign(['kategori_id']);
            $table->dropForeign(['penulis_id']);
            $table->dropColumn(['kategori_id', 'penulis_id']);
        });
    }
};
