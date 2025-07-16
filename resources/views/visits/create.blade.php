@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="col-md-8">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
        </div>
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="container">
                        <h1 class="mb-4">Pendaftaran Kunjungan Rawat Jalan</h1>



                        <form action="{{ route('visits.store') }}" method="POST">
                            @csrf

                            {{-- Pasien --}}
                            <div class="mb-3">
                                <label for="patient_id" class="form-label">Pasien</label>
                                <select name="patient_id" class="form-select @error('patient_id') is-invalid @enderror"
                                    required>
                                    <option value="">-- Pilih Pasien --</option>
                                    @foreach ($patients as $patient)
                                        <option value="{{ $patient->id }}"
                                            {{ old('patient_id') == $patient->id ? 'selected' : '' }}>
                                            {{ $patient->name }} - {{ $patient->nik }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('patient_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Poli / Departemen --}}
                            <div class="mb-3">
                                <label for="department" class="form-label">Poli / Departemen</label>
                                <select name="department" class="form-select @error('department') is-invalid @enderror"
                                    required>
                                    <option value="">-- Pilih Poli --</option>
                                    @foreach ($departments as $dept)
                                        <option value="{{ $dept }}"
                                            {{ old('department') == $dept ? 'selected' : '' }}>{{ $dept }}</option>
                                    @endforeach
                                </select>
                                @error('department')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Dokter --}}
                            <div class="mb-3">
                                <label for="doctor_name" class="form-label">Dokter</label>
                                <select name="doctor_name" class="form-select @error('doctor_name') is-invalid @enderror"
                                    required>
                                    <option value="">-- Pilih Dokter --</option>
                                    @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor }}"
                                            {{ old('doctor_name') == $doctor ? 'selected' : '' }}>{{ $doctor }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('doctor_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Tanggal Kunjungan --}}
                            <div class="mb-3">
                                <label for="visit_date" class="form-label">Tanggal Kunjungan</label>
                                <input type="date" name="visit_date"
                                    class="form-control @error('visit_date') is-invalid @enderror"
                                    value="{{ old('visit_date') }}" required>
                                @error('visit_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Keluhan --}}
                            <div class="mb-3">
                                <label for="complaint" class="form-label">Keluhan</label>
                                <input id="complaint" type="hidden" name="complaint" value="{{ old('complaint') }}">
                                <trix-editor input="complaint"
                                    class="@error('complaint') is-invalid @enderror"></trix-editor>
                                @error('complaint')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Tombol --}}
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('patients.index') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan Kunjungan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
