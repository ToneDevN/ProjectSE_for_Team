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
        Schema::create('attendance_sessions', function (Blueprint $table) {
            $table->unsignedBigInteger('attendanceSession_id')->autoIncrement();
            $table->unsignedBiginteger('subject_id');
            $table->string('attendanceSession');
            $table->dateTime('attendanceOpen');
            $table->dateTime('attendanceClose');
            $table->dateTime('attendanceLate');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['attendanceSession_id', 'subject_id']);
            $table->foreign('subject_id')->references('subject_id')->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance_sessions');
    }
};
