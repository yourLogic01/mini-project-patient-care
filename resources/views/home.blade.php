@extends('layouts.main')

@section('container')
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bold">Patient Care</h1>
            <p class="lead">Sistem Manajemen Pendaftaran Pasien Rawat Jalan</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <p>
                    Aplikasi ini dibuat untuk memudahkan proses administrasi rumah sakit dalam mencatat data pasien dan
                    kunjungan rawat jalan.
                    Anda dapat mengelola data pasien, mendaftarkan kunjungan, serta melihat riwayat layanan dengan mudah dan
                    cepat.
                </p>

                <div class="mt-4">
                    <a href="{{ route('patients.index') }}" class="btn btn-success btn-lg me-2">Kelola Pasien</a>
                    <a href="{{ route('visits.create') }}" class="btn btn-outline-success btn-lg">Daftar Kunjungan</a>
                </div>
            </div>
        </div>
    </div>
@endsection
