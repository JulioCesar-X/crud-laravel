<?php

namespace App\Imports;

use App\Player;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

class PlayersImport implements ToModel
{
    use Importable;

    public function model(array $row)
    {
        return new Player([
            'id' => $row['ID'],
            'name' => $row['Name'],
            'address' => $row['Address'],
            'description' => $row['Description'],
            'retired' => $row['Retired'],
            'date_create' => $row[6],
            'date_update' => $row[7],
        ]);
    }

}
