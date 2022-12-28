<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name');
            $table->string('nokk');
            $table->string('nik');
            $table->string('jeniskelamin');
            $table->string('agama');
            $table->string('tempatlahir');
            $table->string('tanggallahir');
            $table->string('image');
            $table->string('alamat');
            $table->string('email');
            $table->string('phone');
            $table->string('namemati');
            $table->string('nikmati');
            $table->string('imagemati');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_pendaftarans');
    }
}
