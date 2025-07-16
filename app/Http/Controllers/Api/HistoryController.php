<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\Visit;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visits = Visit::with('patient')->latest()->paginate(10);
        return response()->json($visits);
    }

    /**
     * Display the specified resource.
     */
    public function show(Visit $visit)
    {
        $visit->load('patient');
        return response()->json($visit);
    }

    public function byPatient($id)
    {
        $patient = Patient::findOrFail($id);
        $visits = $patient->visits()->latest()->get();

        return response()->json([
            'patient' => $patient->only(['id', 'name', 'nik']),
            'visits' => $visits,
        ]);
    }
}
