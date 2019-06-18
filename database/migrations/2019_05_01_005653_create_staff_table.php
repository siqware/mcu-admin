<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('gov_official_no');
            $table->string('profile_picture')->default('/files/shares/mcu_logo.jpg');
            $table->string('khmer_name');
            $table->string('latin_name');
            $table->string('gender');
            $table->string('dob');
            $table->string('id_no');
            $table->string('bank_acc_no');
            $table->string('last_appointment');
            $table->string('start_work');
            $table->string('real_appoint');
            $table->string('skill');
            $table->string('phone_num');
            $table->string('email');
            $table->timestamps();
            $table->charset='utf8';
            $table->collation='utf8_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff');
    }
}
