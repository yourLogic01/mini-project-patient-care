@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h2 class="mb-4">Detail Kunjungan</h2>

                    <div class="mb-3 border-bottom pb-2 d-flex">
                        <div class="fw-bold me-3" style="width: 150px;">Pasien</div>
                        <div>{{ $visit->patient->name }}</div>
                    </div>

                    <div class="mb-3 border-bottom pb-2 d-flex">
                        <div class="fw-bold me-3" style="width: 150px;">NIK</div>
                        <div>{{ $visit->patient->nik }}</div>
                    </div>

                    <div class="mb-3 border-bottom pb-2 d-flex">
                        <div class="fw-bold me-3" style="width: 150px;">Gender</div>
                        <div>
                            @if ($visit->patient->gender == 'L')
                                Laki-laki
                            @else
                                Perempuan
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 border-bottom pb-2 d-flex">
                        <div class="fw-bold me-3" style="width: 150px;">No HP</div>
                        <div>{{ $visit->patient->phone }}</div>
                    </div>

                    <div class="mb-3 border-bottom pb-2 d-flex">
                        <div class="fw-bold me-3" style="width: 150px;">Alamat</div>
                        <div>{!! $visit->patient->address !!}</div>
                    </div>

                    <div class="mb-3 border-bottom pb-2 d-flex">
                        <div class="fw-bold me-3" style="width: 150px;">Tanggal Kunjungan</div>
                        <div>{{ $visit->visit_date->format('d-m-Y') }}</div>
                    </div>

                    <div class="mb-3 border-bottom pb-2 d-flex">
                        <div class="fw-bold me-3" style="width: 150px;">Poli</div>
                        <div>{{ $visit->department }}</div>
                    </div>

                    <div class="mb-3 border-bottom pb-2 d-flex">
                        <div class="fw-bold me-3" style="width: 150px;">Dokter</div>
                        <div>{{ $visit->doctor_name }}</div>
                    </div>

                    <div class="mb-3 border-bottom pb-2 d-flex">
                        <div class="fw-bold me-3" style="width: 150px;">Keluhan</div>
                        <div>{!! $visit->complaint !!}</div>
                    </div>

                    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
