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
        Schema::create('labs', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('ta_id');
            $table->unsignedBigInteger('labSession_id');
            $table->integer('labScore')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['student_id', 'subject_id', 'ta_id', 'labSession_id']);
            $table->foreign('student_id')->references('student_id')->on('students');
            $table->foreign('subject_id')->references('subject_id')->on('lab_sessions');
            $table->foreign('ta_id')->references('ta_id')->on('tas');
            $table->foreign('labSession_id')->references('labSession_id')->on('lab_sessions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('labs');
    }
};
