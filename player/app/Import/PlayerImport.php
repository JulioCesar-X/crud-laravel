<?php

namespace App\Import;

use App\Player;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class PlayerImport 
{
    protected $Player;


    public function __construct(Player $Player)
    {
        $this->Player = $Player;
    }

    public function allData(Request $request)
    {
        // Insert Players in the database
        $read = IOFactory::load($request->file('file'));
        $data = $read->getActiveSheet()->toArray();

        $line = 0;
        $created = 0;
        $updated = 0;

        foreach ($data as $item) {
            // Condition to verify if has 6 columns in the worksheet
            if (count($item) == 6) {
                if ($line > 0) {
                    // Verify if the current Player exists
                    $id = $item[0];
                    $Player = Player::where('id', $id)->first();

                    // If Player exists
                    if (!empty($Player)) {
                        $Player->update([
                            'name' => $item[1],
                            'address' => $item[2],
                            'retired' => $item[3],
                        ]);
                        $updated++;
                    } else {
                        Player::create([
                            'id' => $id,
                            'name' => $item[1],
                            'address' => $item[2],
                            'retired' => $item[3],
                        ]);
                        $created++;
                    }
                }
                $line++;
            } else {
                throw new Exception('Error: Player import failed');
            }
        }

        // Returns imported worksheet notification
        $notification = [
            'message' => "worksheet_imported",
            'created' => $created,
            'updated' => $updated
        ];
        return $notification;
    }
}
