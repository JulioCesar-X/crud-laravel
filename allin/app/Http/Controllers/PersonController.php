<?php

namespace App\Http\Controllers;

use App\Person;
use App\Country;
use App\Bicycle;
use Illuminate\Http\Request;

class PersonController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        $people = Person::paginate( 20 );

        return view( 'pages.person.index', [ 'people' => $people ] );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        $countries = Country::all();

        return view( 'pages.person.create', [ 'countries' => $countries ] );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        $this->validate( $request, [

            'country_id'        => 'required',
            'first_name'        => 'required',
            'last_name'         => 'required',
            'birth_date'        => 'required',
            // 'image'       => 'required'

        ] );

        person::create( $request->all() );
        //criar com todos as colunas
        //manualmente quando preciso de validação, separo para conquistar
        // $person                = new Person();
        // $person->name          = $request->name;
        // $person->first_name    = $request->first_name;
        // $person->last_name     = $request->last_name;
        // $person->birth_date    = $request->birth_date;
        // $person->save();

        // if ( $request->file( 'image' ) ) {

        //     $imagePath = $request->file( 'image' );

        //     //define name
        //     $imageName = $person->id.'_'.time().'_'.$imagePath->getClientOriginalName();

        //     //save on storage
        //     $path = $request->file( 'image' )->storeAs( 'images/persons/'.$person->id, $imageName, 'public' );

        //     //save image path
        //     $person->image = $path;

        // }

        // $person->save();

        return redirect( 'person' )->with( 'Success', 'Person successful!' );

    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Person  $person
    * @return \Illuminate\Http\Response
    */

    public function show( Person $person ) {

        return view( 'pages.person.show', [ 'person' => $person ] );
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Person  $person
    * @return \Illuminate\Http\Response
    */

    public function edit( Person $person ) {

        $countries = Country::all();
        $bicycles  = Bicycle::inRandomOrder()->limit( 15 )->get();

        return view( 'pages.person.edit', [ 'person' => $person, 'countries' => $countries, 'bicycles' => $bicycles ] );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Person  $person
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, Person $person ) {

        // dd($request->all());

        $this->validate( $request, [

            'country_id'     => 'required',
            'first_name'     => 'required',
            'last_name'      => 'required',
            'birth_date'     => 'required',
            // 'image'       => 'required'

        ] );

        $person->update( $request->all() );

        // Processar as bicicletas
        foreach ( $request->input( 'bicycles', [] ) as $key => $bicycleData ) {
            // Obter a bicicleta pelo ID
            $bicycle = Bicycle::findOrFail( $key );

            // Atualizar os campos do modelo e cor
            $bicycle->update( [
                'model' => $bicycleData[ 'model' ],
                'color' => $bicycleData[ 'color' ]
            ] );
        }

        // if ( $request->file( 'image' ) ) {
        //     $imagePath = $request->file( 'image' );
        //     //define name
        //     $imageName = $person->id . '_' . time() . '_' . $imagePath->getClientOriginalName();

        //     //save on storage
        //     $path = $request->file( 'image' )->storeAs( 'images/person/' . $person->id, $imageName, 'public' );

        //     //save image path
        //     $person->image = $path;
        // }
        // $person->update( $request->all() );
        return redirect( 'person' )->with( 'Success', 'Person successfully changed!' );
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Person  $person
    * @return \Illuminate\Http\Response
    */

    public function destroy( Person $person ) {
        //caso tenha uma file ou diretorio para excluir do storage
        // Storage::deleteDirectory( 'public/images/person/'.$person->id );

        // //for specific file
        // Storage::delete( 'public/'.$person->id );

        $person->delete();
        return redirect( 'person' )->with( 'Success', 'Person excluded successfully!' );
    }
}
