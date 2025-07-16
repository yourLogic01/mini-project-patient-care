@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow mb-4 ">
                <div class="card-body">
                    <div class="container">
                        <h1 class="mb-4">Tambah Pasien Baru</h1>

                        <form action="{{ route('patients.store') }}" method="POST">
                            @csrf

                            {{-- Nama --}}
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- NIK --}}
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" name="nik" pattern="\d{16}" inputmode="numeric" maxlength="16"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}"
                                required>
                            @error('nik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            {{-- Jenis Kelamin --}}
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('gender') is-invalid @enderror" type="radio"
                                        name="gender" value="L" {{ old('gender') == 'L' ? 'checked' : '' }}> Laki-laki
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('gender') is-invalid @enderror" type="radio"
                                        name="gender" value="P" {{ old('gender') == 'P' ? 'checked' : '' }}> Perempuan
                                </div>
                                @error('gender')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Tanggal Lahir --}}
                            <div class="mb-3">
                                <label for="birth_date" class="form-label">Tanggal Lahir</label>
                                <input type="date" name="birth_date"
                                    class="form-control @error('birth_date') is-invalid @enderror"
                                    value="{{ old('birth_date') }}" required>
                                @error('birth_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Telepon --}}
                            <div class="mb-3">
                                <label for="phone" class="form-label">Telepon</label>
                                <input type="text" name="phone" pattern="\d{10,15}" inputmode="numeric" maxlength="15"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                    class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}"
                                    required>

                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Alamat --}}
                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <input id="address" type="hidden" name="address" value="{{ old('address') }}">
                                <trix-editor input="address" class="@error('address') is-invalid @enderror"></trix-editor>
                                @error('address')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Tombol --}}
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('patients.index') }}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
