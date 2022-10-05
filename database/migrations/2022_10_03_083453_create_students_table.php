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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('college_id')->unsigned()->nullable();
            $table->unsignedBigInteger('dept_id')->unsigned()->nullable();
            $table->string('year');
            $table->string('f_name');
            $table->string('s_name');
            $table->string('t_name');
            $table->string('fo_name');
            $table->string('admission_type');
            $table->string('study_type');
            $table->string('country');
            $table->string('certificate_id');
            $table->string('date_certificate');
            $table->softDeletes();
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
        Schema::dropIfExists('students');
    }
};
