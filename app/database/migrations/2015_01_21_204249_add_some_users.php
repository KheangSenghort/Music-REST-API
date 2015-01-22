<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		User::create(array(
			'email' => 'jane.doe@gmail.com',
			'password' => Hash::make('janepassword'),
		));
		User::create(array(
			'email' => 'john.doe@gmail.com',
			'password' => Hash::make('johnpassword'),
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
