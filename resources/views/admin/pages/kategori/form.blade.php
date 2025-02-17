@extends('admin.layouts.app')

@section('title', 'Kategori')

@section('content')
<div class="row px-3">
    <div class="py-2 border-bottom">
        <h1 class="h1">Kategori</h1>
    </div>
    <div class="row px-3 pt-3 pb-4 bg-white rounded shadow">
        <div class="col-lg-12">
            <div class="row g-4">
                <div class="col-lg-6">
                   <form action="{{ @$category ? route('kategori.update', $category) : route('kategori.store') }}"  method="POST" enctype="multipart/form-data">
                        @csrf
                          @method(@$category ? 'PUT' : 'POST')
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Nama Kategori</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama kategori" value="{{ @$category ? $category->name : '' }}"  required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold"  >Deskripsi</label>
                           <textarea class="form-control" id="description" name="description" rows="3" placeholder="Tambahkan deskripsi kategori">{{ old('description', @$category ? $category->description : '') }}</textarea>

                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i> Simpan Kategori
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
