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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->float('harga', 11, 1);
            $table->text('info');
            $table->string('gambar_1');
            $table->string('gambar_2');
            $table->unsignedBigInteger('fotografer_id');

            $table->timestamps();

            // Definisikan foreign key
            $table->foreign('fotografer_id', 'fk_produk_fotografer_1')
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
        Schema::dropIfExists('produk');
    }
};
