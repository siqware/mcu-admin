<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContinueStudyingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('continue_studyings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('attachment')->default('NaN');
            $table->date('attachment_date')->default(now());
            $table->date('from_date')->default(now());
            $table->date('to_date')->default(now());
            $table->integer('times')->default(1);
            $table->boolean('is_done')->default(false);
            $table->bigInteger('staff_id')->unsigned();
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
        Schema::dropIfExists('continue_studyings');
    }
}
