<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVisitRequest;
use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    // Store a daftar kunjungan
    public function store(StoreVisitRequest $request)
    {
        $visit = $request->validated();
        Visit::create($visit);
        return response()->json([
            'message' => 'Kunjungan berhasil ditambahkan',
            'data' => $visit,
        ], 201);
    }
}
