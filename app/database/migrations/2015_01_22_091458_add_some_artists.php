<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeArtists extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$rolling_stones = Artist::create(array('name' => 'Rolling Stones'));
		$rolling_stones->Songs()->attach(array(2));

		$jazmine_sullivan = Artist::create(array('name' => 'Jazmine Sullivan'));
		$jazmine_sullivan->Songs()->attach(array('1','3'));

		$r_kelly = Artist::create(array('name' => 'R.Kelly'));
		$r_kelly->Songs()->attach(array(1));
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