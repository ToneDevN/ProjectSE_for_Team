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
        Schema::create('lab_sessions', function (Blueprint $table) {
            $table->unsignedBigInteger('labSession_id')->autoIncrement();
            $table->unsignedBigInteger('subject_id');
            $table->string('labSession');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['labSession_id', 'subject_id']);
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
        Schema::dropIfExists('lab_sessions');
    }
};
