<?php

namespace App\Http\Controllers;

use App\Exports\ClientsExport;
use App\Imports\ClientsImport;
use App\Models\Client;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FirstEncounterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Client::all();
        return view('pages/firstEncounter/first-encounter', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $patient = Client::findOrFail($id);
        return view('pages/firstEncounter/view-patient', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function export() 
    {
        return Excel::download(new ClientsExport, 'clients.csv');
    }

    public function import(Request $request) 
    {
        Excel::import(new ClientsImport, $request->file);
        
        return redirect('/')->with('success', 'All good!');
    }
}
