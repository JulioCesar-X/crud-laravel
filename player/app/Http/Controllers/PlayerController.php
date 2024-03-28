<?php
namespace App\Http\Controllers;

use App\Player;
use App\Address;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\Session;

use App\Exports\PlayersExport;
use App\Imports\PlayersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

//API extension para dateTime
use Carbon\Carbon;



class PlayerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::paginate(15);

        return view('pages.players.index', ['players' => $players]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $addresses = Address::all();

        return view('pages.players.create-player', ['addresses' => $addresses ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'name'        => "required",
            'address'     => "required",
            'description' => "required",
            'retired'     => "required",
            'image'       => "required|image|mimes:jpeg,png,jpg,gif,svg"

        ]);

        // Player::create($request->all());//criar com todos as colunas

        $player                = new Player();
        $player->name          = $request->name;
        $player->address       = $request->address;
        $player->description   = $request->description;
        $player->retired       = $request->retired;
        $player->save();

        if ($request->file('image')) {

            $imagePath = $request->file('image');

            //define name
            $imageName = $player->id.'_'.time().'_'.$imagePath->getClientOriginalName();

            //save on storage
            $path = $request->file('image')->storeAs('images/players/'.$player->id, $imageName, 'public');

            //save image path
            $player->image = $path;

        }

        $player->save();

        return redirect('players')->with('status',"Player criado com sucesso!");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        return view('pages.players.show-player',['player' => $player]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        $addresses = Address::all();

        return view('pages.players.edit-player', ['player' => $player, 'addresses' => $addresses ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        $dadosValidados = $request->validate([

            'name'        => "required|string|min:2|max:25",
            'address'     => "required|string|",
            'description' => "required",
            'retired'     => "required",
            'image'     => "required"
        ]);

        $player->update($dadosValidados);

        return redirect('players')->with('status', 'Player alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        Storage::deleteDirectory('public/images/players/'.$player->id);

        //for specific file
        Storage::delete('public/'.$player->id);


        $player->delete();
        return redirect('players')->with('status', 'Player excluído com sucesso!');
    }




    public function export(){

        $fileName = "players_" . Carbon::now()->format('Y-m-d') . ".csv";

        Session::flash('status', "Arquivo $fileName gerado com sucesso!");

        $response = Excel::download(new PlayersExport, $fileName, \Maatwebsite\Excel\Excel::CSV);

        return $response;

    }

    public function import()
    {
        return view('pages.players.import');

    }


    public function storeImport(Request $request){
        try {


            $notificationData = $this->allData($request);

            $notification = [
                'status' => 'Imported' . $notificationData['created'] . ' data created, ' . $notificationData['updated'] . ' data updated.',
                'alert-type' => 'success'

            ];


            return redirect('players')->with($notification);

        } catch (\Exception $e) {

            $notification = [
                'status' => 'not_imported' . ': ' . $e->getMessage(),
                'alert-type' => 'danger'
            ];


            return redirect('players')->with($notification);
        }
    }

    public function allData(Request $request){

        $array = (new PlayersImport)->toArray($request->file('file'));

        if ($array) {

            $rowCount = Player::count();

            $created = $rowCount - 1;
            $updated = 0;

            $line = 0;

            foreach ($array as $item) {

                // dd(count($item)); //10 ??

                if (count($item) == 10) {
                    if ($line > 0) {

                        $id = $item[0];
                        $Player = Player::where('id', $id)->first();

                        if ($Player !== null) {

                            $Player->update([
                                'name' => $item[1],
                                'address' => $item[2],
                                'description' => $item[3],
                                'retired' => $item[4],
                            ]);
                            $updated++;

                        } else {

                            Player::create([
                                'id' => $id,
                                'name' => $item[1],
                                'address' => $item[2],
                                'description' => $item[3],
                                'retired' => $item[4],
                            ]);
                            $created++;
                        }
                    }

                    $line++;

                } else {
                    throw new \Exception('Error: columns not sure');
                }
            }

            $notification = [
                'status' => "worksheet_imported",
                'created' => $created,
                'updated' => $updated
            ];

            return $notification;

        } else {

            throw new \Exception('Error: Player import failed');
        }


    }

}
