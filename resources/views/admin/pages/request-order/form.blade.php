@extends('admin.layouts.app')

@section('title', 'Produk')

@section('content')
@if ($message = session('success'))
    <x-alert type="success" :message="$message" />
@endif

@if ($message = session('error'))
    <x-alert type="danger" :message="$message" />
@endif
<div class="row px-3">
    <div class="py-2 border-bottom">
        <h1 class="h1">Produk</h1>
    </div>
    <div class="row px-3 pt-3 pb-4 bg-white rounded shadow">
        <div class="col-lg-12">
            <div class="row g-4">
                <div class="col-lg-12">
                    <form action="{{ route('request-order.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method(@$produk ? 'PUT' : 'POST')

                        <div class="row">
                            {{-- Left Column --}}
                            <div class="col-md-6">
                                
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">Pilih Barang</label>
                                    <select class="form-select" id="product_id" name="product_id" required>
                                        <option value="">Pilih Barang</option>
                                        @foreach ($products as $item)
                                            <option value="{{ $item->id }}" {{ @$product && $product->id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                               
                            </div>

                            {{-- Right Column --}}
                            <div class="col-md-6">
                                
                                <div class="mb-3">
                                    <label for="stock" class="form-label fw-bold">Jumlah</label>
                                    <input type="number" class="form-control" id="stock" name="quantity" placeholder="Masukkan Jumlah" value="{{ @$product ? $product->stock : '' }}" required>
                                </div>
                                <div class="mb-3">
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
                                </div>
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
