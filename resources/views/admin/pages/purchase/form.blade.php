@extends('admin.layouts.app')

@section('title', 'Pembelian')
@section('content')
@if ($message = session('success'))
    <x-alert type="success" :message="$message" />
@endif

@if ($message = session('error'))
    <x-alert type="danger" :message="$message" />
@endif
<div class="row px-3">
    <div class="py-2 border-bottom">
        <h1 class="h1">Pembelian</h1>
    </div>
    <div class="row px-3 pt-3 pb-4 bg-white rounded shadow">
        <div class="col-lg-12">
            <div class="row g-4">
                <div class="col-lg-12">
                    <form action="{{ @$transaction ? route('purchase.update', $transaction) : route('purchase.store') }}" method="POST">
                        @csrf
                        @method(@$transaction ? 'PUT' : 'POST')

                        <div class="row">
                            {{-- Left Column --}}
                            <div class="col-md-6">
                                
                                <div class="mb-3">
                                    <label for="product_id" class="form-label fw-bold">Produk</label>
                                    <select class="form-select" id="product_id" name="product_id" required>
                                        <option value="" disabled selected>Pilih Produk</option>
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}" {{ @$transaction && $transaction->product_id == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="qty" class="form-label fw-bold">Jumlah</label>
                                    <input type="number" class="form-control" id="qty" name="qty" placeholder="Masukkan jumlah" value="{{ @$transaction ? $transaction->qty : '' }}" required>
                                </div>
                            </div>

                            {{-- Right Column --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="price" class="form-label fw-bold">Harga</label>
                                    <input type="number" class="form-control" id="price" name="price" placeholder="Masukkan harga" value="{{ @$transaction ? $transaction->price : '' }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="customer_id" class="form-label fw-bold">Pelanggan</label>
                                    <select class="form-select" id="customer_id" name="customer_id" required>
                                        <option value="" disabled selected>Pilih Pelanggan</option>
                                        @foreach($customers as $customer)
                                            <option value="{{ $customer->id }}" {{ @$transaction && $transaction->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
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
@endsection
