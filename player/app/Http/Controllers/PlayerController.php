<?php
namespace App\Http\Controllers;

use App\Http\Requests\ImportRequest;
use App\Import\PlayerImport;
use App\Export\PlayerExport;
use App\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;



class PlayerController extends Controller
{

    protected $player_import;
    protected $player_export;

    public function __construct(PlayerImport $player_import, PlayerExport $player_export) {
        $this->player_import = $player_import;
        $this->player_export = $player_export;
    }
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
        return view('pages.players.create-player');
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
            'retired'     => "required"

        ]);

        Player::create($request->all());//criar com todos as colunas

        return redirect('players')->with('sucesso',"Player criado com sucesso!");

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
        return view('pages.players.edit-player', ['player' => $player]);
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
            'retired'     => "required"
        ]);

        $player->update($dadosValidados);

        return redirect('players')->with('successo', 'Player alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        $player->delete();
        return redirect('players')->with('successo', 'Player excluído com sucesso!');
    }

    public function export()
    {


    }
    public function import()
    {
        return view('pages.players.import');

    }
    public function storeImport(ImportRequest $request)
    {
        try {

            // Aqui você pode processar o arquivo conforme necessário, por exemplo, passando-o para o método allData do seu serviço de importação
            $notificationData = $this->player_import->allData($request);

            // Criando a mensagem de sucesso com base nos dados de notificação
            $notification = [
                'title' => 'Success',
                'message' => 'Imported ' . $notificationData['created'] . ' data created, ' . $notificationData['updated'] . ' data updated.',
                'alert-type' => 'success'
            ];

            // Redirecionando para a página de jogadores com a mensagem de sucesso
            return redirect('players')->with($notification);
        } catch (\Exception $e) {
            // Se ocorrer uma exceção, cria uma mensagem de erro
            $notification = [
                'title' => 'Error',
                'message' => 'not_imported' . ': ' . $e->getMessage(),
                'alert-type' => 'danger'
            ];

            // Redirecionando de volta com a mensagem de erro e mantendo os dados de entrada anteriores
            return back()->with($notification)->withInput();
        }
    }

}
