<?php

namespace App\Exports;

use App\Player;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PlayersExport implements FromCollection, WithStrictNullComparison, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Player::all();
    }

    public function headings(): array {
        // Retorna os cabeçalhos das colunas
        return [
            'ID',
            'Name',
            'Address',
            'Description',
            'Retired',
            '',
            'Date'
        ];
    }

}
