<?php

use App\Person;
use App\Bicycle;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(CountrySeeder::class);


        factory(Person::class, 100)->create()->each(function ($person) {
            factory(Bicycle::class, 2)->create(['person_id' => $person->id]);
        });
    }
}
