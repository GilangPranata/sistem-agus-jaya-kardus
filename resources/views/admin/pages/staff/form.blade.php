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
                    <form action="{{ @$staff ? route('staff.update', $staff) : route('staff.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method(@$staff ? 'PUT' : 'POST')

                        <div class="row">
                            {{-- Left Column --}}
                            <div class="col-md-6">
                              
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">Nama Staff</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama Staff" value="{{ @$staff ? $staff->name : '' }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label fw-bold">Alamat</label>
                                    <textarea class="form-control" id="description" name="address" rows="3" placeholder="Alamat">{{ old('description', @$staff ? $staff->address : '') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label fw-bold">Tanggal Bergabung</label>
                                    <input type="date" class="form-control" id="price" name="join_date" placeholder="Masukkan harga" value="{{ @$staff ? $staff->join_date : '' }}" required>
                                </div>
                            </div>

                            {{-- Right Column --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="price" class="form-label fw-bold">Email</label>
                                    <input type="text" class="form-control" id="price" name="email" placeholder="Masukkan email" value="{{ @$staff ? $staff->email : '' }}" required>
                                </div>
                                @if(!isset($staff))
    <div class="mb-3">
        <label for="stock" class="form-label fw-bold">Password</label>
        <input type="password" class="form-control" id="stock" 
            name="password" placeholder="Password" required>
    </div>
@endif

                           
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i> Simpan Staff
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
