<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstEncounterController extends Controller
{
    public function index() {
        return view('pages/firstEncounter/first-encounter');
    }
}
