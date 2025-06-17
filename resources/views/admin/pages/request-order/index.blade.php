{{-- @dd($requestOrders) --}}
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
        <h1 class="h1 text-center">Permintaan Barang</h1>
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
                                    <th>Barang</th>
                                    <th>Jumlah</th>
                                    <th>Pengepul</th>
                                    <th>Tanggal</th>
                                    <th>Konfirmasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($requestOrders as $request)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                      
                                        <td>{{ $request->product->name }}</td>
                                        <td>{{ $request->quantity }}</td>
                                        <td>{{ $request->collector->name }}</td>
                                        
                                        <td>
                                            {{ optional($request->created_at)->format('d-m-Y H:i') ?? now()->format('d-m-Y H:i') }}
                                        </td>

                                        <td>
                                            @if ($request->status === 'pending')
                                                <form action="{{ route('request-order.edit', $request->id) }}"  class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary btn-sm" >
                                                        Konfirmasi
                                                    </button>
    
                                                </form>
                                                @else
                                                    <span class="badge bg-success">Dikonfirmasi</span>

                                            @endif
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
