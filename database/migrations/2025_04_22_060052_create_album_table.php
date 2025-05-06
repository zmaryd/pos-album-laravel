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
        Schema::create('album', function (Blueprint $table) {
            $table->id();
            $table->string('judul_album');
            $table->string('artis');
            $table->string('image');
            $table->date('release_date');
            $table->foreignId('id_genre')->constrained('genre')->onDelete('cascade');
            $table->decimal('harga', 10, 2);
            $table->integer('stok');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('album');
    }
};
