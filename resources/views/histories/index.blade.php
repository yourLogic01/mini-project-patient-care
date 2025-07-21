@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="col-md-10">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="container">
                        <h1 class="mb-4">Riwayat Kunjungan Pasien</h1>

                        {{-- Form Pilih Pasien --}}
                        <form action="{{ route('histories.index') }}" method="GET" class="mb-4">
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <select name="patient_id" class="form-select" required>
                                        <option value="">-- Pilih Pasien --</option>
                                        @foreach ($patients as $patient)
                                            <option value="{{ $patient->id }}"
                                                {{ request('patient_id') == $patient->id ? 'selected' : '' }}>
                                                {{ $patient->name }} - {{ $patient->nik }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                                </div>
                            </div>
                        </form>

                        {{-- Tabel Riwayat --}}
                        @if ($selectedPatient)
                            <h5>Pasien: <strong>{{ $selectedPatient->name }}</strong></h5>

                            @if ($visits->count())
                                <table class="table table-bordered mt-3">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Poli</th>
                                            <th>Dokter</th>
                                            <th>Keluhan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($visits as $visit)
                                            <tr>
                                                <td>{{ $visit->visit_date->format('d-m-Y') }}</td>
                                                <td>{{ $visit->department }}</td>
                                                <td>{{ $visit->doctor_name }}</td>
                                                <td>{!! Str::limit(strip_tags($visit->complaint), 30) !!}</td>
                                                <td>
                                                    <a href="{{ route('histories.show', $visit) }}"
                                                        class="btn btn-sm btn-info">Lihat Detail</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p class="text-muted mt-3">Belum ada kunjungan untuk pasien ini.</p>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
