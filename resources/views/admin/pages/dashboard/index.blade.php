@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
@if ($message = session('success'))
    <x-alert type="success" :message="$message" />
@endif

@if ($message = session('error'))
    <x-alert type="danger" :message="$message" />
@endif

<div class="row px-3">
    <div class="py-2 border-bottom">
        <h1 class="h1 text-center">Dashboard</h1>
    </div>

    {{-- Filter Form --}}
  <form method="GET" action="{{ route('dashboard.index') }}" class="row g-3 align-items-center bg-white p-3 rounded shadow mb-4">
    <div class="col-md-6">
        <label for="month" class="form-label">Pilih Bulan:</label>
        <select name="month" id="month" class="form-select">
            <option value="">Semua</option>
            @foreach(range(1, 12) as $m)
                <option value="{{ $m }}" {{ request('month') == $m ? 'selected' : '' }}>
                    {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6 text-end">
        <button type="submit" class="btn btn-primary mt-4">
            <i class="bi bi-search"></i> Filter
        </button>
    </div>
</form>


    <div class="row px-3 pt-3 pb-4 bg-white rounded shadow">
        {{-- Total Revenue --}}



        <div class="col-lg-12">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    
                        {{-- only admin can see --}}

                        
                        @if (Auth::user()->name == 'admin')
                           
            <a href="{{ route('request-order.index') }}">
                @endif
                        <div class="card border-info shadow-sm">
                            <div class="card-body text-center">
                                <h5 class="card-title text-info">Total Permintaan Pengepul</h5>
                                <h3 class="card-text">{{ $requestOrders  }} </h3>
                            </div>
                        </div>
                    </a>
</div>
                {{-- Total Products --}}
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card border-primary shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title text-primary">Total Produk</h5>
                            <h3 class="card-text">{{ $products }}</h3>
                        </div>
                    </div>
                </div>

                {{-- Total Categories --}}
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card border-secondary shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title text-secondary">Total Pengeluaran</h5>
                            <h3 class="card-text">Rp. {{ number_format($totalOutcome, 0, ',', '.') }}</h3>

                        </div>
                    </div>
                </div>

                {{-- Total Staff --}}
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card border-success shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title text-success">Total Pemasukan</h5>
                            <h3 class="card-text">Rp. {{ number_format($totalIncome, 0, ',', '.') }}</h3>
                        </div>
                    </div>
                </div>

                {{-- Total Customers --}}
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card border-danger shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title text-danger">Total Pelanggan</h5>
                            <h3 class="card-text">{{ $buyers }}</h3>
                        </div>
                    </div>
                </div>

                {{-- Total Transactions --}}
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card border-warning shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title text-warning">Total Transaksi</h5>
                            <h3 class="card-text">{{ $transactions }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Print Buttons --}}
            <div class="mt-4 text-center">
                {{-- <a href="{{ route('transactions.print') }}" class="btn btn-primary me-2">
                    <i class="bi bi-printer me-1"></i> Print Transaksi
                </a> --}}
                <a href="{{ route('stock.print') }}" class="btn btn-secondary">
                    <i class="bi bi-printer me-1"></i> Print Stok
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
