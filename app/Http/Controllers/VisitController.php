<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVisitRequest;
use App\Models\Patient;
use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function create()
    {
        $patients = Patient::all();

        // Hardcoded poli & dokter
        $departments = ['Umum', 'Gigi', 'Anak', 'Kandungan'];
        $doctors = ['dr. Jhon Doe', 'dr. Alex Smith', 'dr. Saber Parker', 'dr. Will Smith'];

        return view('visits.create', compact('patients', 'departments', 'doctors'));
    }

    public function store(StoreVisitRequest $request)
    {
        $data = $request->validated();
        Visit::create($data);
        return redirect()->route('visits.create')->with('success', 'Data Kunjungan berhasil ditambahkan');
    }
}
