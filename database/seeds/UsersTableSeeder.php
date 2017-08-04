<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reset the users table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        
        DB::table('users')->truncate();

        // generate 3 users/author
        DB::table('users')->insert([
        	[
        	    'name' => "Jenna Ham",
        	    'email' => "jenna@hotmail.com",
        	    'password' => bcrypt('secret')
        	],
        	[
        	    'name' => "John Doe",
        	    'email' => "johndoe@test.com",
        	    'password' => bcrypt('secret')
        	],
        	[
        	    'name' => "Jan Doe",
        	    'email' => "jane@test.com",
        	    'password' => bcrypt('secret')
        	],
        ]);
    }
}
