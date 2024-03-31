<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Illuminate\Support\Facades\Storage;

use App\Bicycle;
use Faker\Generator as Faker;

$factory->define(Bicycle::class, function (Faker $faker) {

     // Caminho original da imagem no diretório público
    $originalImagePath = 'public/pngwing.com (41).png';

    // Caminho onde a imagem será salva dentro do diretório storage/app/public
    $imagePath = 'pngwing.com (41).png';

    // Verifica se o arquivo já existe no destino antes de tentar copiá-lo
    if (!Storage::exists($imagePath)) {
        // Copia a imagem do diretório público para o diretório de armazenamento
        Storage::copy($originalImagePath, $imagePath);
    }


    return [
        'person_id' => rand(1,100),
        'brand'     => $faker->word,
        'model'     => $faker->word,
        'color'     => $faker->hexColor,
        'price'     => $faker->randomFloat(2, 100, 1000), // Gera um preço aleatório entre 100 e 1000 com duas casas decimais
        'image'     => $imagePath
    ];
});
