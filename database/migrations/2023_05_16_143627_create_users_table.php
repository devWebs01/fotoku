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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('kecamatan_id')->nullable();
            $table->unsignedInteger('role_id');
            //
            $table->string('nama');
            $table->enum('spesialisasi', ['Photography Wedding', 'Photography Birthday', 'Photography Food', 'Photography Fashion', 'Photography Street', 'Photography Outdoor'])->nullable();
            $table->string('no_telp')->nullable();
            $table->text('alamat')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('status', ['Aktif', 'Non Aktif'])->default('Aktif');
            $table->date('tgl_lahir')->nullable();
            $table->text('foto_profile')->nullable();
            $table->timestamps();

            // foreign key
            $table->foreign('kecamatan_id', 'fk_users_kecamatan_0')->references('id')->on('kecamatan')->onDelete('cascade');
            $table->foreign('role_id', 'fk_users_role_1')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
