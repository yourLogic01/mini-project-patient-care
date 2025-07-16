<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Visit;
use Illuminate\Http\Request;

class HistoryController extends Controller
{

    public function index(Request $request)
    {
        $patients = Patient::all();
        $selectedPatient = null;
        $visits = collect();

        if ($request->filled('patient_id')) {
            $selectedPatient = Patient::find($request->patient_id);
            $visits = $selectedPatient ? $selectedPatient->visits : collect();
        }

        return view('histories.index', compact('patients', 'selectedPatient', 'visits'));
    }

    public function show(Visit $visit)
    {
        return view('histories.show', compact('visit'));
    }
}
