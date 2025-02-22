@extends('admin.layouts.app')

@section('title', 'customer')

@section('content')
<div class="row px-3">
    <div class="py-2 border-bottom">
        <h1 class="h1">Pelanggan</h1>
    </div>
    <div class="row px-3 pt-3 pb-4 bg-white rounded shadow">
        <div class="col-lg-12">
            <div class="row g-4">
                <div class="col-lg-12">
                    <form action="{{ @$customer ? route('pelanggan.update', $customer) : route('pelanggan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method(@$customer ? 'PUT' : 'POST')

                        <div class="row">
                            {{-- Left Column --}}
                            <div class="col-md-6">
                                
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">Nama Pelanggan</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama Pelanggan" value="{{ @$customer ? $customer->name : '' }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label fw-bold">Alamat</label>
                                    <textarea class="form-control" id="description" name="address" rows="3" placeholder="Tambahkan alamat pelanggan">{{ old('description', @$customer ? $customer->address : '') }}</textarea>
                                </div>
                            </div>

                            {{-- Right Column --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="price" class="form-label fw-bold">Telepon</label>
                                    <input type="text" class="form-control" id="price" name="phone" placeholder="Masukkan Telepon" value="{{ @$customer ? $customer->phone : '' }}" required>
                                </div>
                               
                              
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i> Simpan 
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
