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
        DB::table('users')->insert(array(
        [
         'name' => 'admin', 
         'email' => 'admin@admin.com',
         'password' => bcrypt('admin'),
         'level' => 1
        ],
        [
         'name' => 'kasir', 
         'email' => 'kasir@admin.com',
         'password' => bcrypt('kasir'),
         'level' => 2
        ]
      ));
    }
}
