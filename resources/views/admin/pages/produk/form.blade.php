@extends('admin.layouts.app')

@section('title', 'Produk')

@section('content')
<div class="row px-3">
    <div class="py-2 border-bottom">
        <h1 class="h1">Produk</h1>
    </div>
    <div class="row px-3 pt-3 pb-4 bg-white rounded shadow">
        <div class="col-lg-12">
            <div class="row g-4">
                <div class="col-lg-12">
                    <form action="{{ @$product ? route('produk.update', $product->id) : route('produk.store') }}" method="POST">
    @csrf
    @if (@$product)
        @method('PUT')
    @endif



                        <div class="row">
                            {{-- Left Column --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="category_id" class="form-label fw-bold">Kategori</label>
                                    <select class="form-select" id="category_id" name="category_id" required>
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}" {{ @$product && $product->category_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">Nama Barang</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama kategori" value="{{ @$product ? $product->name : '' }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label fw-bold">Deskripsi</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Tambahkan deskripsi kategori">{{ old('description', @$product ? $product->description : '') }}</textarea>
                                </div>
                            </div>

                            {{-- Right Column --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="purchase_price" class="form-label fw-bold">Harga Beli</label>
                                    <input type="number" class="form-control" id="purchase_price" name="purchase_price" placeholder="Masukkan harga beli" value="{{ @$product ? $product->purchase_price : '' }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="sale_price" class="form-label fw-bold">Harga Jual</label>
                                    <input type="number" class="form-control" id="sale_price" name="sale_price" placeholder="Masukkan harga jual" value="{{ @$product ? $product->sale_price : '' }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="stock" class="form-label fw-bold">Stok</label>
                                    <input type="number" class="form-control" id="stock" name="stock" placeholder="Masukkan stok" value="{{ @$product ? $product->stock : '' }}" required>
                                </div>
                                {{-- <div class="mb-3">
                                    <label for="unit" class="form-label fw-bold">Satuan</label>
                                    <select class="form-select" id="unit" name="unit" required>
                                        <option value="pcs">pcs</option>
                                        <option value="kg">kg</option>
                                        <option value="gr">gr</option>
                                        <option value="ml">ml</option>
                                        <option value="liter">liter</option>
                                        <option value="box">box</option>
                                        <option value="dus">dus</option>
                                        <option value="pack">pack</option>
                                        <option value="set">set</option>
                                        <option value="lusin">lusin</option>
                                        <option value="gross">gross</option>
                                        <option value="rim">rim</option>
                                        <option value="kodi">kodi</option>
                                        <option value="gallon">gallon</option>
                                        <option value="ton">ton</option>
                                        <option value="kwintal">kwintal</option>
                                        <option value="kuintal">kuintal</option>
                                        <option value="ons">ons</option>
                                        <option value="mg">mg</option>
                                        <option value="dag">dag</option>
                                        <option value="kw">kw</option>
                                        <option value="kwh">kwh</option>
                                        <option value="kva">kva</option>
                                        <option value="kvar">kvar</option>
                                    </select>
                                </div> --}}
                            </div>
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
