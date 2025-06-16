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
                                    <th>Produk</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Tanggal</th>
                               
                              
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        @if ($transaction->transactionable_type == 'App\Models\Purchase')
                                            <td class="text-success">Pembelian</td>
                                        @elseif ($transaction->transactionable_type == 'App\Models\Sale')
                                            <td class="text-danger">Penjualan</td>
   
                                        @endif
                                        <td>{{ $transaction->transactionable->product->name }}</td>
                                        <td>{{ $transaction->transactionable->invoice }}</td>
                                        <td>{{ $transaction->transactionable->qty }}</td>
                                        <td>{{ $transaction->transactionable->price }}</td>
                                        {{-- human readable created_at --}}
                                        <td>{{ $transaction->created_at->format('d-m-Y H:i') }}</td>
                                        
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
