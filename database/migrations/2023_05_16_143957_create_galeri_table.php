<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeri', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('judul');
            $table->text('deskripsi');
            $table->unsignedBigInteger('fotografer_id'); // Pastikan tipe data ini

            $table->timestamps();

            // Definisikan foreign key
            $table->foreign('fotografer_id', 'fk_galeri_fotografer_0')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galeri');
    }
};
