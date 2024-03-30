<?php

namespace App\Http\Controllers;

use App\Bicycle;
use Illuminate\Http\Request;

class BicycleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bicycles = Person::paginate(40);

        return view("pages.bicycle.index", [ 'bicycles' => $bicycles ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.bicycle.create');
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

            'person_id'   =>"required",
            'brand'       =>"required",
            'model'       =>"required",
            'color'       =>"required",
            'price'       =>"required",
            'image'       => "required"

        ]);
        // Bicycle::create($request->all());//criar com todos as colunas

      //manualmente quando preciso de validação, separo para conquistar
        $bicycle                = new Bicycle();
        $bicycle->person_id     = $request->person_id;
        $bicycle->brand         = $request->brand;
        $bicycle->model         = $request->model;
        $bicycle->color         = $request->color;
        $bicycle->price         = $request->price;
        $bicycle->save();

        if ($request->file('image')) {

            $imagePath = $request->file('image');
            //define name
            $imageName = $bicycle->id.'_'.time().'_'.$imagePath->getClientOriginalName();
            //save on storage
            $path = $request->file('image')->storeAs('images/bicycles/'.$bicycle->id, $imageName, 'public');
            //save image path
            $bicycle->image = $path;
        }
        $bicycle->save();

        return redirect('index')->with('sucess',"Bicycle successful!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bicycle  $bicycle
     * @return \Illuminate\Http\Response
     */
    public function show(Bicycle $bicycle)
    {
        return view('pages.bicycle.show', ['bicycle' => $bicycle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bicycle  $bicycle
     * @return \Illuminate\Http\Response
     */
    public function edit(Bicycle $bicycle)
    {
        return view('pages.bicycle.edit', ["bicycle"->$bicycle]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bicycle  $bicycle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bicycle $bicycle)
    {
        $this->validate($request, [

            'person_id'   =>"required",
            'brand'       =>"required",
            'model'       =>"required",
            'color'       =>"required",
            'price'       =>"required",
            'image'       => "required"

        ]);
        $bicycle->update($request->all());

        if ($request->file('image')) {

            $imagePath = $request->file('image');
            //define name
            $imageName = $bicycle->id . '_' . time() . '_' . $imagePath->getClientOriginalName();
            //save on storage
            $path = $request->file('image')->storeAs('images/bicycle/' . $bicycle->id, $imageName, 'public');
            //save image path
            $bicycle->image = $path;
        }
        $bicycle->update($request->all());

        return redirect('index')->with('success', 'Bicycle successfully changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bicycle  $bicycle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bicycle $bicycle)
    {

        Storage::deleteDirectory('public/images/bicycles/'.$bicycles->id);
        // //for specific file
        // Storage::delete('public/'.$bicycle->id);
        $bicycle->delete();
        return redirect('index')->with('Success', 'Bicycle deleted Successfully!');
    }
}
