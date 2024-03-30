<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = ["Portugal", "Espanha", "França", "Polónia"];

        foreach ($countries as $country) {

            DB::table('countries')->insert([

                'name' => $country,
            ]);
        }


    }
}
