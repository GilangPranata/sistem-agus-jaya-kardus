{{-- @dd($transactions) --}}
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

    <div class="row px-3 pt-3 pb-4 bg-white rounded shadow">
        <div class="col-lg-12">
            <div class="row g-5">
                {{-- Data Table --}}
                <div class="col-lg-12">
                   

                    <div class="table-responsive" style="max-height: 500px;">
                        <table class="table table-bordered text-center">
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
                                @forelse ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        @if ($transaction->type == 'purchase')
                                            <td class="text-success">Pembelian</td>
                                        @elseif ($transaction->type == 'sale')
                                            <td class="text-danger">Penjualan</td>
   
                                        @endif
                                      
                                        <td>{{ $transaction->invoice }}</td>
                                        <td>{{ $transaction->total_amount }}</td>
                                        <td>{{ $transaction->customer->name ?? 'Gilang' }}</td>
                                        {{-- human readable created_at --}}
                                        <td>{{ $transaction->created_at->format('d-m-Y H:i') }}</td>
                                        <td>
                                            <a href="{{ route('transactions.print', $transaction->id) }}" class="btn btn-sm btn-primary" target="_blank">
                                                <i class="fas fa-print"></i> PDF
                                            </a>
                                        </td>
                                        
                                    </tr>
                                    
                                @empty
                                    <tr>
                                        <td colspan="8">Data tidak ditemukan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
