<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Costumer;
use Session;

class CostumerController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costumers = Costumer::sortable()->paginate(10);
        return view('costumer.index')->withCostumers($costumers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('costumer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|max:255',
            'gender' => 'required|numeric',
            'phone' => 'required',
            'address' => 'required|max:255'
        ));

        $costumer = new Costumer;

        $costumer->name = $request->name;
        $costumer->gender = $request->gender;
        $costumer->phone = $request->phone;
        $costumer->address = $request->address;

        $costumer->save();

        Session::flash('success', 'The Costumer was successfully created!');

        return redirect()->route('costumer.index');
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
        $costumer = Costumer::find($id);

        return view('costumer.edit')->withCostumer($costumer);
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
        $this->validate($request, array(
            'name' => 'required|max:255',
            'gender' => 'required|numeric',
            'phone' => 'required',
            'address' => 'required|max:255'
        ));

        $costumer = Costumer::find($id);

        $costumer->name = $request->input('name');
        $costumer->gender = $request->input('gender');
        $costumer->phone = $request->input('phone');
        $costumer->address = $request->input('address');

        $costumer->save();

        Session::flash('success', 'The Costumer was successfully changed!');

        return redirect()->route('costumer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $costumer = Costumer::find($id);

        $costumer->delete();

        Session::flash('success', 'The Costumer was successfully deleted.');

        return redirect()->route('costumer.index');
    }
}
