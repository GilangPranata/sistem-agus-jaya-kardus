{{-- @dd($products) --}}
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
                    <form action="{{ @$transaction ? route('sale.update', $transaction) : route('sale.store') }}" method="POST">
                        @csrf
                        @method(@$transaction ? 'PUT' : 'POST')
                        <input type="hidden" name="type" value="sale">

                        {{-- Produk dan Qty --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">Produk & Jumlah</label>
                            <div id="product-container">
                                <div class="row product-row mb-2 align-items-end">
                                    <div class="col-md-5">
                                        <select class="form-select" name="product_id[]" required>
                                            <option value="" disabled selected>Pilih Produk</option>
                                            @foreach($products as $product)
                                                <option value="{{ $product->id }}" data-price="{{ $product->sale_price }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" name="qty[]" class="form-control" placeholder="Jumlah" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control subtotal" placeholder="Subtotal" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger remove-product">Hapus</button>
                                    </div>
                                </div>
                            </div>
                            <button type="button" id="add-product" class="btn btn-secondary mt-2">+ Tambah Produk</button>
                        </div>

                        {{-- Pelanggan --}}
                        <div class="col-md-6 mb-3">
                            <label for="customer_id" class="form-label fw-bold">Pelanggan</label>
                            <select class="form-select" id="customer_id" name="customer_id" required>
                                <option value="" disabled selected>Pilih Pelanggan</option>
                                @foreach($collectors as $collector)
                                    <option value="{{ $collector->id }}">{{ $collector->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Total Keseluruhan --}}
                        <div class="mt-3 text-end">
                            <h5>Total: Rp <span id="total-harga">0</span></h5>
                        </div>

                        {{-- Tombol Simpan --}}
                        <div class="d-flex justify-content-end mt-3">
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

{{-- Script Tambah Produk dan Hitung Total --}}
<script>
    function formatRupiah(angka) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(angka).replace('Rp', '').trim();
    }

    function hitungTotal() {
        let total = 0;
        document.querySelectorAll('.product-row').forEach(row => {
            const select = row.querySelector('select[name="product_id[]"]');
            const qtyInput = row.querySelector('input[name="qty[]"]');
            const subtotalInput = row.querySelector('.subtotal');

            const selectedOption = select.options[select.selectedIndex];
            const price = selectedOption ? parseFloat(selectedOption.dataset.price || 0) : 0;
            const qty = parseInt(qtyInput.value || 0);

            const subtotal = price * qty;
            subtotalInput.value = formatRupiah(subtotal);
            total += subtotal;
        });

        document.getElementById('total-harga').innerText = formatRupiah(total);
    }

    document.addEventListener('change', function (e) {
        if (e.target.matches('select[name="product_id[]"], input[name="qty[]"]')) {
            hitungTotal();
        }
    });

    document.getElementById('add-product').addEventListener('click', function () {
        const container = document.getElementById('product-container');
        const newRow = document.createElement('div');
        newRow.classList.add('row', 'product-row', 'mb-2', 'align-items-end');
        newRow.innerHTML = `
            <div class="col-md-5">
                <select class="form-select" name="product_id[]" required>
                    <option value="" disabled selected>Pilih Produk</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" data-price="{{ $product->sale_price }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <input type="number" name="qty[]" class="form-control" placeholder="Jumlah" required>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control subtotal" placeholder="Subtotal" readonly>
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
            hitungTotal();
        }
    });
</script>

@endsection
