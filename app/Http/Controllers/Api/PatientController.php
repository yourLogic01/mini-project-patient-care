<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::latest()->paginate(10);
        return response()->json(['data' => $patients], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientRequest $request)
    {
        $data = $request->validated();
        $patient = Patient::create($data);
        return response()->json(['message' => 'Data Pasien berhasil ditambahkan', 'data' => $patient, 'status' => 201]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $patient = Patient::find($id);
        if (!$patient)
            return response()->json(['message' => 'Not Found'], 404);
        return response()->json(['data' => $patient], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $request, string $id)
    {
        $patient = Patient::find($id);
        if (!$patient)
            return response()->json(['message' => 'Not Found'], 404);
        $data = $request->validated();
        $patient->update($data);
        return response()->json(['message' => 'Data Pasien berhasil diperbarui', 'data' => $patient, 'status' => 200]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patient = Patient::find($id);
        if (!$patient)
            return response()->json(['message' => 'Not Found'], 404);
        $patient->delete();
        return response()->json(['message' => 'Data Pasien berhasil dihapus', 'status' => 200]);
    }
}
