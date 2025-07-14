@extends('admin.layouts.app')

@section('title', 'Riwayat Transaksi')

@section('content')
@if ($message = session('success'))
    <x-alert type="success" :message="$message" />
@endif

@if ($message = session('error'))
    <x-alert type="danger" :message="$message" />
@endif

<div class="row px-3">
    <div class="py-2 border-bottom">
        <h1 class="h1 text-center">Riwayat Transaksi</h1>
    </div>

    {{-- Filter Tanggal --}}
    <div class="row px-3 pt-4 pb-2 bg-white rounded shadow mb-3">
        <form method="GET" class="col-lg-12 d-flex flex-wrap align-items-end gap-3">
            <div>
                <label for="from" class="form-label fw-bold mb-0">Dari Tanggal</label>
                <input type="date" name="from" id="from" class="form-control" value="{{ request('from') }}">
            </div>
            <div>
                <label for="to" class="form-label fw-bold mb-0">Sampai Tanggal</label>
                <input type="date" name="to" id="to" class="form-control" value="{{ request('to') }}">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-filter"></i> Filter
                </button>
                <a href="{{ route('transaction.index') }}" class="btn btn-secondary">
                    <i class="bi bi-x-circle"></i> Reset
                </a>
            </div>
        </form>
    </div>

    {{-- Tabel Data --}}
    <div class="row px-3 pt-3 pb-4 bg-white rounded shadow">
        <div class="col-lg-12">
            <div class="table-responsive" style="max-height: 500px;">
                <table id="transaksiTable" class="table table-bordered text-center">
    <thead class="bg-4">
        <tr>
            <th>No</th>
            <th>Jenis Transaksi</th>
            <th>Invoice</th>
            <th>Total Harga</th>
            <th>Customer</th>
            <th>Tanggal</th>
            <th>Print</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sales as $index => $transaction)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td class="{{ $transaction->type == 'purchase' ? 'text-success' : 'text-danger' }}">
                    {{ $transaction->type == 'purchase' ? 'Pembelian' : 'Penjualan' }}
                </td>
                <td>{{ $transaction->invoice }}</td>
                <td>{{ number_format($transaction->total_amount, 0, ',', '.') }}</td>
                <td>{{ $transaction->customer->name ?? '-' }}</td>
                <td>{{ $transaction->created_at->format('d-m-Y H:i') }}</td>
                <td>
                    <a href="{{ route('transactions.print', $transaction->id) }}" class="btn btn-sm btn-primary" target="_blank">
                        <i class="fas fa-print"></i> PDF
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
            </div>

          
        </div>
    </div>
</div>
@endsection
