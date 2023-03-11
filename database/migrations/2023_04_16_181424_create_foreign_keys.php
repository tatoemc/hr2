<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		
		Schema::table('depts', function(Blueprint $table) {
            $table->foreign('college_id')->references('id')->on ('colleges')->onUpdate('cascade')->onDelete('cascade');
		});
		Schema::table('bromotions', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on ('users')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('degree_id')->references('id')->on ('degrees')->onUpdate('cascade')->onDelete('cascade');
		});

		Schema::table('bonus_salary', function(Blueprint $table) {
            $table->foreign('salary_id')->references('id')->on ('users')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('bonus_id')->references('id')->on ('bonuses')->onUpdate('cascade')->onDelete('cascade');
		});
		Schema::table('leaves', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on ('users')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('vacation_id')->references('id')->on ('vacations')->onUpdate('cascade')->onDelete('cascade');
		});
		Schema::table('users', function(Blueprint $table) {
            $table->foreign('job_id')->references('id')->on ('jobs')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('dept_id')->references('id')->on ('depts')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('degree_id')->references('id')->on ('degrees')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('specialty_id')->references('id')->on ('specialties')->onUpdate('cascade')->onDelete('cascade');
		});
		Schema::table('demissions', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on ('users')->onUpdate('cascade')->onDelete('cascade');
			
		});
		Schema::table('salaries', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on ('users')->onUpdate('cascade')->onDelete('cascade');
			
		});
		Schema::table('payrolls', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on ('users')->onUpdate('cascade')->onDelete('cascade');
			
		});
	}

	public function down()
	{
		
		Schema::table('demissions', function(Blueprint $table) {
			$table->dropForeign('demissions_user_id_foreign');
		});
		Schema::table('payrolls', function(Blueprint $table) {
			$table->dropForeign('payrolls_user_id_foreign');
		});
		Schema::table('depts', function(Blueprint $table) {
			$table->dropForeign('depts_college_id_foreign');
		});
		Schema::table('leaves', function(Blueprint $table) {
			$table->dropForeign('leaves_vacation_id_foreign');
			$table->dropForeign('leaves_user_id_foreign');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_job_id_foreign');
			$table->dropForeign('users_dept_id_foreign');
			$table->dropForeign('users_degree_id_foreign');
			$table->dropForeign('users_specialty_id_foreign');
		});
		Schema::table('bromotions', function(Blueprint $table) {
			$table->dropForeign('bromotions_user_id_foreign');
			
		});

		Schema::table('bonus_salary', function(Blueprint $table) {
			$table->dropForeign('bonus_salary_salary_id_foreign');
			$table->dropForeign('bonus_salary_bonus_id_foreign');
		});

		Schema::table('salaries', function(Blueprint $table) {
			$table->dropForeign('salaries_user_id_foreign');
		});

	}
}
