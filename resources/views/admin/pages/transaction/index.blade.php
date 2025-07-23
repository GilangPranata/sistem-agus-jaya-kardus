@extends('admin.layouts.app')

@section('title', 'Riwayat Transaksi')

@section('content')
    {{-- Notifikasi --}}
    @if ($message = session('success'))
        <x-alert type="success" :message="$message" />
    @endif

    @if ($message = session('error'))
        <x-alert type="danger" :message="$message" />
    @endif

    <div class="row px-3">
        <div class="py-2 border-bottom">
            <h1 class="h1 text-center">Laporan</h1>
        </div>

        {{-- Filter Tanggal --}}
        <div class="row px-3 pt-4 pb-3 bg-white rounded shadow mb-4">
            <form method="GET" class="col-lg-12 d-flex flex-wrap align-items-end gap-3">
                <div>
                    <label for="from" class="form-label fw-bold mb-1">Dari Tanggal</label>
                    <input type="date" name="from" id="from" class="form-control" value="{{ request('from') }}">
                </div>

                <div>
                    <label for="to" class="form-label fw-bold mb-1">Sampai Tanggal</label>
                    <input type="date" name="to" id="to" class="form-control" value="{{ request('to') }}">
                </div>

                <div class="d-flex flex-wrap gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-filter"></i> Filter
                    </button>
                    <a href="{{ route('transaction.index') }}" class="btn btn-secondary">
                        <i class="bi bi-x-circle"></i> Reset
                    </a>
                    <a href="{{ route('transaction.export.pdf', request()->only(['from', 'to'])) }}" class="btn btn-danger">
                        <i class="bi bi-file-earmark-pdf-fill"></i> PDF
                    </a>
                   {{--  <a href="{{ route('transaction.export.excel', request()->only(['from', 'to'])) }}" class="btn btn-success">
                        <i class="bi bi-file-earmark-excel-fill"></i> Excel
                    </a> --}}
                </div>
            </form>
        </div>

        {{-- Tabel Data --}}
        <div class="row px-3 pt-3 pb-4 bg-white rounded shadow">
            <div class="col-lg-12">
                <div class="table-responsive" style="max-height: 500px;">
                    <table id="transaksiTable" class="table table-bordered text-center">
                        <thead class="bg-4 text-center">
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
                            @foreach ($transactions as $index => $transaction)
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
                                        <a href="{{ route('transactions.print', $transaction->id) }}"
                                           class="btn btn-sm btn-primary"
                                           target="_blank">
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
