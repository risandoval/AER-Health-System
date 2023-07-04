<?php

namespace App\Http\Controllers;

use App\Exports\ClientsExport;
use App\Imports\ClientsImport;
use App\Models\Client;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FirstEncounterController extends Controller
{
    // display table of 1st encounter
    public function index() {
        // $patients = Client::all();
        $patients = Client::paginate(5);
        return view('pages/firstEncounter/first-encounter', compact('patients'));
    }

    // Store a newly created resource in storage.
    public function store(Request $request) {
        //
    }

    // Display patient individual details
    public function show($id) {
        $patient = Client::findOrFail($id);
        return view('pages/firstEncounter/view-patient', compact('patient'));
    }

    // Display search result
    public function search(Request $request) {
        $search = $request->get('search');
        $patients = Client::where('name', 'like', '%'.$search.'%')->paginate(5);
        return view('pages/firstEncounter/first-encounter', compact('patients'));
    }

    public function searchPatient(Request $request) {
        $search = $request->get('search');

        if ($search) {
            $allPatient = Client::where('ONE_EF_FIRSTNAME', 'like', '%'.$search.'%')
            ->orWhere('ONE_EF_LASTNAME', 'like', '%'.$search.'%')
            ->orWhere('ONE_EF_PIN', 'like', '%'.$search.'%')
            ->paginate(5);

            // dd($allUser);
            return view('pages/firstEncounter/patient-search-result', compact('allPatient', 'search'));
        } 
        else {
            return view('pages/firstEncounter/patient-search-result', compact('search'))->with('noResult', 'No results found');
        }
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
