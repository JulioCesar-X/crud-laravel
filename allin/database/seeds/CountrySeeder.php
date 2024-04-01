<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PragmaRX\Countries\Package\Countries;

class CountrySeeder extends Seeder {
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {

        $countries = [ 'Portugal', 'Spain', 'France', 'Poland' ];

        foreach ( $countries as $country ) {

            $countrySelected = Countries::where( 'name.common', $country )->first();
            $countryCode = $countrySelected->cca2;
            $path = "https://flagsapi.com/{$countryCode}/shiny/64.png";

            DB::table( 'countries' )->insert( [

                'name' => $country,
                'image' => $path
            ] );
        }

    }
}
