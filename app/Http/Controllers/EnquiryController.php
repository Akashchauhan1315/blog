<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Enquiry;

use App\Models\Manufacture;

use App\Models\Car;

use App\Models\CarModel;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manu=Manufacture::all();

        return view('welcome',compact('manu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'name' => 'required|string',

            'email' => 'required|email',

            'phone' => 'required',

            'address' => 'required|max:100',

            'manu_id' => 'required',

            'car_id' => 'required',

            'model_id' => 'required',
        ],[

            'manu_id.required' => 'The Manufacture field is required',

            'car_id.required' => 'The Car field is required',

            'model_id.required' => 'The Car Model field is required'

        ]);

        Enquiry::create([

            'name' => $request->name,

            'email' => $request->email,

            'phone' => $request->phone,

            'address' => $request->address,

            'manu_id' => $request->manu_id,

            'car_id' => $request->car_id,

            'model_id' => $request->model_id,

        ]);


        //return back()->with('message','Enquiry Form submit Successfully!');

        return redirect()->route('index')->with('message','Enquiry Form submit Successfully!');


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function Carajax(Request $request){


        $car=Car::where('manu_id',$request->id)->get();

        return response(['success' => 200,'data' => $car],200);

    }

    public function Carmodelajax(Request $request){

        $car=CarModel::where('car_id',$request->id)->get();

        return response(['success' => 200,'data' => $car],200);
    }
}
