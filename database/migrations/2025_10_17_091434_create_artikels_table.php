<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('artikel', function (Blueprint $table) {
            $table->id('id_artikel');
            $table->string('judul');
            $table->string('slug')->unique();
            $table->string('kategori')->nullable();
            $table->string('penulis')->nullable();
            $table->text('ringkasan')->nullable();
            $table->longText('isi');
            $table->enum('status', ['draft', 'terbit'])->default('draft');
            $table->timestamp('tanggal_terbit')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('artikel');
    }
};
