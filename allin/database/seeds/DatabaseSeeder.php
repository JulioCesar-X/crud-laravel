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

        // Criar 10 usuários
        factory(Person::class, 100)->create()->each(function ($person) {

            // Criar duas bicicletas para cada usuário
            factory(Bicycle::class, 2)->create(['person_id' => $person->id]);
        });
    }
}
