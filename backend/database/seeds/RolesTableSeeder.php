<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('roles')->delete();
      $json = File::get("database/data-example/rols.json");
      $data = json_decode($json);
      foreach ($data as $obj) {
          Role::create(array(
              'id' => $obj->id,
              'name' => $obj->name,
          ));
      }
    }
}
