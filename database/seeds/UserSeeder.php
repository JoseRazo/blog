<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
       	'name' => 'Jose Razo',
       	'email' => 'jrazo@utsalamanca.edu.mx',
       	'password' => bcrypt('Jose18'),
       	'type' => 'admin'
       ]);
    }
}
