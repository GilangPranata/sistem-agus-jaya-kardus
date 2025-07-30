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
            <form action="{{ @$transaction ? route('sale.update', $transaction) : route('sale.store') }}" method="POST">
                @csrf
                @method(@$transaction ? 'PUT' : 'POST')
                <input type="hidden" name="type" value="sale">

                {{-- Produk dan Qty --}}
                <div class="mb-3">

                    <div id="product-container">
                        <div class="row product-row mb-2 align-items-end">
                           <div class="col-md-2">
    <label class="form-label fw-bold">Produk</label>
    <select class="form-select" name="product_id[]" required>
        <option value="" disabled selected>Pilih Produk</option>
        @foreach($products as $product)
            <option value="{{ $product->id }}" data-price="{{ $product->sale_price }}" data-stock="{{ $product->stock }}">{{ $product->name }}</option>

        @endforeach
    </select>
</div>

                            <div class="col-md-2">
                                <label class="form-label fw-bold">Harga</label>
                                <input type="text" class="form-control Harga" placeholder="Harga" readonly>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label fw-bold">Jumlah</label>
                                <input type="number" name="qty[]" class="form-control" placeholder="Jumlah" required>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label fw-bold">Stok</label>
                                <input type="text" class="form-control stock" placeholder="Stok" readonly>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label fw-bold">Total Harga</label>
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
                    <label for="customer_id" class="form-label fw-bold">Pengepul</label>
                    <select class="form-select" id="customer_id" name="customer_id" required>
                        <option value="" disabled selected>Pilih Pengepul</option>
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

{{-- Script --}}
<script>
    function formatRupiah(angka) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(angka).replace('Rp', '').trim();
    }

    function updateStockAndSubtotal() {
        let isValid = true;
        const submitBtn = document.querySelector('button[type="submit"]');

        document.querySelectorAll('.product-row').forEach(row => {
            const select = row.querySelector('select[name="product_id[]"]');
            const qtyInput = row.querySelector('input[name="qty[]"]');
            const hargaInput = row.querySelector('.Harga');
            const subtotalInput = row.querySelector('.subtotal');
            const stockInput = row.querySelector('.stock');

            const selectedOption = select.options[select.selectedIndex];
            const price = selectedOption ? parseFloat(selectedOption.dataset.price || 0) : 0;
            const stock = selectedOption ? parseInt(selectedOption.dataset.stock || 0) : 0;
            const qty = parseInt(qtyInput.value || 0);

            // Hitung dan tampilkan harga + stok
            hargaInput.value = formatRupiah(price);
            stockInput.value = stock;
            subtotalInput.value = formatRupiah(price * qty);

            // Validasi stok
            if (qty > stock) {
                qtyInput.classList.add('is-invalid');
                isValid = false;
            } else {
                qtyInput.classList.remove('is-invalid');
            }
        });

        hitungTotal();
        // Nonaktifkan tombol submit jika ada input tidak valid
        submitBtn.disabled = !isValid;
    }

  function hitungTotal() {
    let total = 0;
    document.querySelectorAll('.product-row').forEach(row => {
        const subtotalInput = row.querySelector('.subtotal');
        const raw = subtotalInput.value;

        // Convert "5.000,00" menjadi 5000.00
        let cleaned = raw.replace(/\./g, '').replace(',', '.').replace(/[^\d.]/g, '');

        let angka = parseFloat(cleaned);
        if (!isNaN(angka)) {
            total += angka;
        }
    });

    document.getElementById('total-harga').innerText = formatRupiah(total);
}


    document.addEventListener('input', function (e) {
        if (e.target.matches('select[name="product_id[]"], input[name="qty[]"]')) {
            updateStockAndSubtotal();
        }
    });

    document.getElementById('add-product').addEventListener('click', function () {
        const container = document.getElementById('product-container');
        const newRow = document.createElement('div');
        newRow.classList.add('row', 'product-row', 'mb-2', 'align-items-end');
        newRow.innerHTML = `
            <div class="col-md-2">
                <select class="form-select" name="product_id[]" required>
                    <option value="" disabled selected>Pilih Produk</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" data-price="{{ $product->sale_price }}" data-stock="{{ $product->stock }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control Harga" placeholder="Harga" readonly>
            </div>
            <div class="col-md-2">
                <input type="number" name="qty[]" class="form-control" placeholder="Jumlah" required>
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control stock" placeholder="Stok" readonly>
            </div>
            <div class="col-md-2">
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
            updateStockAndSubtotal();
        }
    });

    // Inisialisasi
    document.addEventListener('DOMContentLoaded', updateStockAndSubtotal);
</script>

@endsection
