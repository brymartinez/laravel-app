<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patients;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $patients = Patients::all();

        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required|date'
        ]);

        $patients = new Patients([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'birth_date' => $request->get('birth_date')
        ]);

        $patients->save();
        return redirect('/patients')->with('success','Patient has been added!');
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
        $patient = Patients::find($id);

        return view('patients.edit', compact('patient'));
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
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required|date'
        ]);

        $patient = Patients::find($id);

        $patient->first_name = $request->get('first_name');
        $patient->last_name = $request->get('last_name');
        $patient->birth_date = $request->get('birth_date');

        $patient->save();
        return redirect('/patients')->with('success','Patient has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patients::find($id);
        $patient->delete();
   
        return redirect('/patients')->with('success', 'Patient has been removed.');
    }
}
