<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeSongs extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Song::create(array(
			'title' => 'I Wish',
			'release_year' => '2000'
		));

		Song::create(array(
			'title' => 'Hot Stuff',
			'release_year' => '1978'
		));

		Song::create(array(
			'title' => 'Lion, Tigers and Bears',
			'release_year' => '2005'
		));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
