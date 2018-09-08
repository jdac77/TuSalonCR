<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     *
    *public function run()
  *  {
   *   DB::table('users')->insert([
   *     'role_id' => '1',
   *     'name' => 'Jose David',
    *    'phone' => '70176756',
     *   'email' => 'jdavidac77@gmail.com',
      *  'password' => bcrypt('123'),
     * ]);
     * DB::table('users')->insert([
     *   'role_id' => '2',
      *  'salon_id' => '1',
       ** 'name' => 'Melody',
       * 'phone' => '70188856',
       * 'email' => 'user@gmail.com',
       * 'password' => bcrypt('123'),
      *]);
    *}
    */


     
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'Jose David',
            'phone' => '70176756',
            'email' => 'jdavidac77@gmail.com',
            'password' => bcrypt('123456'),
          ]);
          DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'Daniel',
            'phone' => '70188856',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123456'),
          ]);
    }


}
