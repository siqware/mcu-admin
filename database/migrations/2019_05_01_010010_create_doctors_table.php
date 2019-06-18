<?php

use App\App_Class;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('staff_id')->unsigned();
            $table->string('attachment')->default('/files/shares/mcu_logo.jpg');
            $table->string('specialty')->default('NaN');
            $table->string('po_educated')->default(App_Class::formatDate(now()));
            $table->string('start_date')->default(App_Class::formatDate(now()));
            $table->string('end_date')->default(App_Class::formatDate(now()));
            $table->timestamps();
            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade');
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
        Schema::dropIfExists('doctors');
    }
}
