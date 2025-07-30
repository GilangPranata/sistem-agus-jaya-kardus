@extends('admin.layouts.app')
<link rel="icon" type="image/png" href="{{ asset('img/LOGO.png') }}">
@section('title', 'Pembelian')

@section('content')
@if ($message = session('success'))
    <x-alert type="success" :message="$message" />
@endif

@if ($message = session('error'))
    <x-alert type="danger" :message="$message" />
@endif

<div class="container-fluid px-4">
    <div class="text-center py-4 border-bottom mb-4">
        <h2 class="fw-bold text-dark">Transaksi Pembelian</h2>
    </div>

  {{-- Filter & Tombol Tambah --}}
<div class="bg-white rounded shadow-sm p-4 mb-4">
    <form method="GET" class="row g-3 align-items-end">
        <div class="col-md-3">
            <label for="from" class="form-label fw-bold">Dari Tanggal</label>
            <input type="date" name="from" id="from" class="form-control" value="{{ request('from') }}">
        </div>
        <div class="col-md-3">
            <label for="to" class="form-label fw-bold">Sampai Tanggal</label>
            <input type="date" name="to" id="to" class="form-control" value="{{ request('to') }}">
        </div>

        <div class="col-md-3 d-flex gap-2">
            <button type="submit" class="btn btn-primary w-100">
                <i class="bi bi-filter"></i> Filter
            </button>
            <a href="{{ route('transaction.index') }}" class="btn btn-outline-secondary w-100">
                <i class="bi bi-x-circle"></i> Reset
            </a>
        </div>

         {{-- Tombol Tambah Transaksi dipindahkan ke sini --}}
        <div class="mb-3">
   <a href="{{ route('purchase.create') }}" class="btn btn-primary">
    <i class="bi bi-plus-circle"></i> Tambah transaksi
</a>

</div>

    </form>
</div>


    {{-- Tabel Riwayat Transaksi --}}
    <div class="bg-white rounded shadow-sm p-4">
        <div class="table-responsive" style="max-height: 500px;">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Jenis Transaksi</th>
                        <th>Invoice</th>
                        <th>Total Harga</th>
                        <th>Pelanggan</th>
                        <th>Tanggal</th>
                        <th>Cetak</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sales as $index => $transaction)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="{{ $transaction->type == 'purchase' ? 'text-success fw-bold' : 'text-danger fw-bold' }}">
                                {{ $transaction->type == 'purchase' ? 'Pembelian' : 'Penjualan' }}
                            </td>
                            <td>{{ $transaction->invoice }}</td>
                            <td>Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}</td>
                            <td>{{ $transaction->customer->name ?? '-' }}</td>
                            <td>{{ $transaction->created_at->format('d-m-Y H:i') }}</td>
                            <td>
                                <a href="{{ route('transactions.print', $transaction->id) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                    <i class="fas fa-print"></i> PDF
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-muted">Tidak ada data transaksi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
