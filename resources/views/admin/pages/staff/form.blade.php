@extends('admin.layouts.app')

@section('title', 'Pegawai')

@section('content')
<div class="row px-3">
    <div class="py-2 border-bottom">
        <h1 class="h1">Pegawai</h1>
    </div>
    <div class="row px-3 pt-3 pb-4 bg-white rounded shadow">
        <div class="col-lg-12">
            <div class="row g-4">
                <div class="col-lg-12">
                    <form action="{{ isset($staff) ? route('staff.update', $staff) : route('staff.store') }}" method="POST">
                        @csrf
                        @method(isset($staff) ? 'PUT' : 'POST')

                        <div class="row">
                            {{-- Left Column --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">Nama Pegawai</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Masukkan nama pegawai" value="{{ old('name', $staff->name ?? '') }}" required>
                                    @error('name')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label fw-bold">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Masukkan email" value="{{ old('email', $staff->email ?? '') }}" required>
                                    @error('email')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Right Column --}}
                            <div class="col-md-6">
                                @if (!isset($staff))
                                <div class="mb-3">
                                    <label for="password" class="form-label fw-bold">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Masukkan password" required>
                                    @error('password')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label fw-bold">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" placeholder="Ulangi password" required>
                                </div>
                                @else
                                <div class="alert alert-info">
                                    Biarkan password kosong jika tidak ingin mengubahnya.
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label fw-bold">Password Baru (Opsional)</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Kosongkan jika tidak ingin mengganti">
                                    @error('password')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label fw-bold">Konfirmasi Password Baru</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" placeholder="Ulangi password baru">
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i> Simpan Pegawai
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
