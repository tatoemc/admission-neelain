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
            $table->string('frmno');
            $table->string('N1');
            $table->string('N2');
            $table->string('N3');
            $table->string('N4');
            $table->string('SCHS');
            $table->string('N_FACS');
            $table->string('ENTS');
            $table->string('admission_type');
            $table->string('study_type');
            $table->string('faculty'); 
            $table->unsignedBigInteger('doc_id')->unsigned();
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
