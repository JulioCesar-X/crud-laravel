<?php

namespace App\Http\Controllers;

use App\Country;
//biblioteca para obter todos os paises e seus codigos
use PragmaRX\Countries\Package\Countries;
//composer require pragmarx/countries

use Illuminate\Http\Request;

class CountryController extends Controller {

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index() {

        $countries = Country::paginate( 20 );
        return view( 'pages.country.index', [ 'countries' => $countries ] );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create() {

        $countries = Countries::all()->random(50);

        return view( 'pages.country.create', [ 'countries' => $countries ] );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {

        $this->validate( $request, [

            'name'   => 'required',

        ] );

        $country = new Country();
        $country->name = $request->name;

        // Encontra o país pelo nome fornecido
        $countrySelected = Countries::where( 'name.common' , $request->name )->first();

        if ( $countrySelected ) {

            $countryCode = $countrySelected->cca2;
            // Converte o nome do país para o formato esperado pela API com base no https://flagsapi.com/
            $path = "https://flagsapi.com/{$countryCode}/shiny/64.png";
            $country->image = $path;
            $country->save();
        }
        return redirect( 'country' )->with( 'Success', 'Country registered Successfully' );
    }
    /**
    * Display the specified resource.
    *
    * @param  \App\Country  $country
    * @return \Illuminate\Http\Response
    */

    public function show( Country $country ) {

        return view( 'pages.country.show', [ 'country' => $country ] );
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Country  $country
    * @return \Illuminate\Http\Response
    */

    public function edit( Country $country ) {

        $countries = Countries::all()->random(50);

        return view( 'pages.country.edit', [ 'country'=>$country, 'countries'=>$countries ] );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Country  $country
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, Country $country ) {

        $this->validate( $request, [

            'name'   =>'required',
        ] );

        $country->update( $request->all() );

        // Encontra o país pelo nome fornecido
        $countrySelected = Countries::where( 'name.common' , $request->name )->first();

        if ( $countrySelected ) {

            $countryCode = $countrySelected->cca2;
            // Converte o nome do país para o formato esperado pela API com base no https://flagsapi.com/
            $path = "https://flagsapi.com/{$countryCode}/flat/64.png";
            $country->image = $path;
            $country->update();
        }
        return redirect( 'country' )->with( 'Success', 'Country registered Successfully' );
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Country  $country
    * @return \Illuminate\Http\Response
    */

    public function destroy( Country $country ) {

        $country->delete();
        return redirect( 'country' )->with( 'Success', 'Country deleted Successfully!' );
    }
}
