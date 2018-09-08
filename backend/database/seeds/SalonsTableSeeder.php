<?php

use Illuminate\Database\Seeder;
use App\Salon;

class SalonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('salons')->delete();
        $json = File::get("database/data-example/salons.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            Salon::create(array(
                'id' => $obj->id,
                'name' => $obj->name,
                'address' => $obj->address,
                'phone' => $obj->phone,
                'email' => $obj->email,
                'contact' => $obj->contact,
                'state' => $obj->state
            ));
        }
    }
}
