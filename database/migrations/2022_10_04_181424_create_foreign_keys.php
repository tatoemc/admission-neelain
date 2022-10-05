<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('college_id')->references('id')->on('colleges')->onDelete('cascade');
		}); 

		Schema::table('depts', function(Blueprint $table) {
			$table->foreign('college_id')->references('id')->on('colleges')->onDelete('cascade');
		}); 

		Schema::table('students', function(Blueprint $table) {
			$table->foreign('college_id')->references('id')->on('colleges')->onDelete('cascade');
			$table->foreign('dept_id')->references('id')->on('depts')->onDelete('cascade');
		}); 
		
	}

	public function down()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_college_id_foreign');
		});
		Schema::table('dept', function(Blueprint $table) {
			$table->dropForeign('depts_college_id_foreign');
		});
		
		Schema::table('students', function(Blueprint $table) {
			$table->dropForeign('students_college_id_foreign');
			$table->dropForeign('students_dept_id_foreign');
		});
       
	}
}
