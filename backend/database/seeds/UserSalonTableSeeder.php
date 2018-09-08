<?php

use Illuminate\Database\Seeder;

class UserSalonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_salon')->insert([
            'user_id' => 1,
            'salon_id' => 1
        ]);
        DB::table('user_salon')->insert([
            'user_id' => 1,
            'salon_id' => 2
        ]);
    }
}
