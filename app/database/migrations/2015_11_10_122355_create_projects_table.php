<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('name');
			$table->text('description');
			$table->integer('sqft');
			$table->string('locality');
			$table->string('address');
			$table->string('contact_name');
			$table->string('contact_number');
			$table->integer('bhk');
			$table->integer('price');
			$table->string('type');
			$table->decimal('gps_latitude',10,7);
			$table->decimal('gps_longitude',10,7);

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
		Schema::drop('projects');
	}

}
