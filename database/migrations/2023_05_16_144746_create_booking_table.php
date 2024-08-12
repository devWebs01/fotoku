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
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelanggan_id');
            $table->unsignedBigInteger('produk_id');
            $table->unsignedBigInteger('jadwal_id');

            $table->float('total_bayar', 11, 1)->nullable();
            $table->float('total_booking', 11, 1)->nullable();
            $table->text('bukti_booking')->nullable();
            $table->text('bukti_bayar')->nullable();
            $table->enum('status_booking', ['Booking', 'Cancel', 'DP', 'Lunas', 'Selesai'])->default('DP');
            $table->timestamps();

            // Define foreign key constraints with unique names
            $table->foreign('pelanggan_id', 'fk_booking_pelanggan_0')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('produk_id', 'fk_booking_produk_1')->references('id')->on('produk')->onDelete('cascade');
            $table->foreign('jadwal_id', 'fk_booking_jadwal_2')->references('id')->on('jadwal')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking');
    }
};
