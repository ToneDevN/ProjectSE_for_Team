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
        Schema::create('lectures', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('attendanceSession_id');
            $table->integer('lectureScore')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['student_id', 'subject_id', 'attendanceSession_id']);
            $table->foreign('student_id')->references('student_id')->on('students');
            $table->foreign('subject_id')->references('subject_id')->on('attendance_sessions');
            $table->foreign('attendanceSession_id')->references('attendanceSession_id')->on('attendance_sessions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lectures');
    }
};
