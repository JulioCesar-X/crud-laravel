<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::paginate(20);

        return view("pages.country.index", [ 'countries' => $countries ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.country.create');
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
            'name'   =>"required",
            'image'  =>"required",
        ]);

        $country = new Country();
        $country->name = $request->name;
        $country->save();

        if ($request->file('image')) {

            $imagePath = $request->file('image');
            //define name
            $imageName = $country->id.'_'.time().'_'.$imagePath->getClientOriginalName();
            //save on storage
            $path = $request->file('image')->storeAs('images/countries/'.$country->id, $imageName, 'public');

            $country->image = $request->file('image');
        }

        $country->save();

        return redirect('country')->with('Success','Country registered Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        return view('pages.country.show', ['country' => $country]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('pages.country.edit', ["country"->$country]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $this->validate($request, [

            'name'   =>"required",
        ]);
        $country->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();
        return redirect('country')->with('Success', 'Country deleted Successfully!');
    }
}
