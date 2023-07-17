<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Exports\ClientsExport;
use App\Imports\ClientsImport;
use App\Models\Audit_history; 
use App\Exports\CSVTemplateExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Excel as ExcelExcel;


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

    public function exportClient() 
    {   
        $username = auth()->user()->username;
        $fullName = auth()->user()->first_name . ' ' . auth()->user()->last_name;
        $action = 'Export client table';
        $history = new audit_history();
        $history->username = $username;
        $history->full_name = $fullName;
        $history->action = $action;
        $history->created_at = Carbon::now('Asia/Manila');
        $history->updated_at = Carbon::now('Asia/Manila');
        $history->save();

        return Excel::download(new ClientsExport, 'clients.csv');
    }

    public function exportCSVTemplate() 
    {
        $username = auth()->user()->username;
        $fullName = auth()->user()->first_name . ' ' . auth()->user()->last_name;
        $action = 'Export CSV Client Template';
        $history = new audit_history();
        $history->username = $username;
        $history->full_name = $fullName;
        $history->action = $action;
        $history->created_at = Carbon::now('Asia/Manila');
        $history->updated_at = Carbon::now('Asia/Manila');
        $history->save();

        return Excel::download(new CSVTemplateExport(), 'clientsTemplate.csv');
    }
    
    public function import(Request $request) 
    {
        $username = auth()->user()->username;
        $fullName = auth()->user()->first_name . ' ' . auth()->user()->last_name;
        $action = 'Import 1st Encounter';
        $history = new audit_history();
        $history->username = $username;
        $history->full_name = $fullName;
        $history->action = $action;
        $history->created_at = Carbon::now('Asia/Manila');
        $history->updated_at = Carbon::now('Asia/Manila');
        $history->save();

        if ($request->hasFile('csv_file')) {
            Excel::import(new ClientsImport, $request->file('csv_file'));
        }

        return redirect()->back()->with('success', 'Import completed!');
    }
}
 