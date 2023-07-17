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
    //---------- First encounter tab ----------
    public function index() {
        $patients = Client::paginate(10);
        return view('pages/firstEncounter/first-encounter', compact('patients'));
    }

    //---------- Display patient's detailed information ----------
    public function show($id) {
        $patient = Client::findOrFail($id);
        return view('pages/firstEncounter/view-patient', compact('patient'));
    }

    //---------- Patient search result ----------
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
            ->paginate(10);

            if ($search) {
                $allPatient->appends(['search' => $search]); // Append 'search' to pagination links
            }

            return view('pages/firstEncounter/patient-search-result', compact('allPatient', 'search'));
        } 
        else {
            return view('pages/firstEncounter/patient-search-result', compact('search'))->with('noResult', 'No results found');
        }
    }

    //---------- Export client table ----------
    public function exportClient() {  
        $history = new audit_history();
        $history->username = auth()->user()->username;
        $history->full_name = auth()->user()->first_name . ' ' . auth()->user()->last_name;
        $history->action ='Export client table';
        $history->save();

        return Excel::download(new ClientsExport, 'clients.csv');
    }

    //---------- Export CSV Template ----------
    public function exportCSVTemplate() {
        $history = new audit_history();
        $history->username = auth()->user()->username;
        $history->full_name = auth()->user()->first_name . ' ' . auth()->user()->last_name;
        $history->action = 'Export CSV Client Template';
        $history->save();

        return Excel::download(new CSVTemplateExport(), 'clientsTemplate.csv');
    }
    
    //---------- Import CSV file ----------
    public function import(Request $request) {
        $history = new audit_history();
        $history->username = auth()->user()->username;
        $history->full_name = auth()->user()->first_name . ' ' . auth()->user()->last_name;
        $history->action = 'Import 1st Encounter';
        $history->save();

        if ($request->hasFile('csv_file')) {
            Excel::import(new ClientsImport, $request->file('csv_file'));
        }

        return redirect()->back()->with('success', 'Import completed!');
    }
}
 