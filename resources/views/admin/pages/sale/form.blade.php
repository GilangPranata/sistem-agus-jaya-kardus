@extends('admin.layouts.app')

@section('title', 'Penjualan')
@section('content')
@if ($message = session('success'))
    <x-alert type="success" :message="$message" />
@endif

@if ($message = session('error'))
    <x-alert type="danger" :message="$message" />
@endif

<div class="row px-3">
    <div class="py-2 border-bottom">
        <h1 class="h1">Penjualan</h1>
    </div>
    <div class="row px-3 pt-3 pb-4 bg-white rounded shadow">
        <div class="col-lg-12">
            <div class="row g-4">
                <div class="col-lg-12">
                    <form action="{{ @$transaction ? route('purchase.update', $transaction) : route('purchase.store') }}" method="POST">
                        @csrf
                        @method(@$transaction ? 'PUT' : 'POST')
                        <input type="hidden" name="type" value="sale">

                        {{-- Invoice --}}
                        <div class="row">
                            {{-- Produk dan Qty --}}
                            <div class="col-md-12 mb-3">
                                <label class="form-label fw-bold">Produk & Jumlah</label>
                                <div id="product-container">
                                    <div class="row product-row mb-2">
                                        <div class="col-md-6">
                                            <select class="form-select" name="product_id[]" required>
                                                <option value="" disabled selected>Pilih Produk</option>
                                                @foreach($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="qty[]" class="form-control" placeholder="Jumlah" required>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger remove-product">Hapus</button>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" id="add-product" class="btn btn-secondary mt-2">+ Tambah Produk</button>
                            </div>

                            {{-- Pelanggan --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                            <label for="customer_id" class="form-label fw-bold">Pelanggan</label>
                                    <select class="form-select" id="customer_id" name="customer_id" required>
                                        <option value="" disabled selected>Pilih Pelanggan</option>
                                        @foreach($collectors as $collector)
                                            <option value="{{ $collector->id }}">{{ $collector->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i> Simpan Transaksi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Script Tambah Produk --}}

<script>
    document.getElementById('add-product').addEventListener('click', function () {
        const container = document.getElementById('product-container');
        const newRow = document.createElement('div');
        newRow.classList.add('row', 'product-row', 'mb-2');
        newRow.innerHTML = `
            <div class="col-md-6">
                <select class="form-select" name="product_id[]" required>
                    <option value="" disabled selected>Pilih Produk</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <input type="number" name="qty[]" class="form-control" placeholder="Jumlah" required>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger remove-product">Hapus</button>
            </div>
        `;
        container.appendChild(newRow);
    });

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-product')) {
            e.target.closest('.product-row').remove();
        }
    });
</script>

@endsection
