@extends('layouts.main')

@section('container')
    <div class="container">
        <h1 class="mb-4">Daftar Pasien</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-3 d-flex justify-content-between align-items-center">
            <a href="{{ route('patients.create') }}" class="btn btn-primary">Tambah Pasien</a>

            <form action="{{ route('patients.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari pasien...">
                <button class="btn btn-outline-secondary">Cari</button>
            </form>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Gender</th>
                    <th>Tgl Lahir</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($patients as $index => $patient)
                    <tr>
                        <td>{{ $patients->firstItem() + $index }}</td>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->nik }}</td>
                        <td>{{ $patient->gender }}</td>
                        <td>{{ $patient->birth_date->format('d-m-Y') }}</td>
                        <td>
                            <a href="{{ route('patients.edit', $patient) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('patients.destroy', $patient) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Yakin ingin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $patients->links() }}
        </div>
    </div>
@endsection
