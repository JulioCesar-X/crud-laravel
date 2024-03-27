<?php

namespace App\Exports;

use App\Player;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class PlayersExport implements FromCollection, WithStrictNullComparison
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Player::all();
    }
    public function headings(): array
    {
        // Retorna os cabeçalhos das colunas
        return [

            'ID',
            'Name',
            'Address',
            'Retired',
            'Create_date',
            'Update_date'
        ];
    }
    
}
