@extends('admin.layouts.app')
<link rel="icon" type="image/png" href="{{ asset('img/LOGO.png') }}">
@section('title', 'Produk')

@section('content')
@if ($message = session('success'))
    <x-alert type="success" :message="$message" />
@endif

@if ($message = session('error'))
    <x-alert type="danger" :message="$message" />
@endif

<div class="row px-3">
    @role('admin')
    <div class="py-2 border-bottom">
        <h1 class="h1 text-center">Produk</h1>
    </div>
    @endrole

    <div class="row px-3 pt-3 pb-4 bg-white rounded shadow">
        <div class="col-lg-12">
            <div class="row g-5">
                {{-- Data Table --}}
                <div class="col-lg-12">
                    @role('admin')
    <a href="{{ route('produk.create') }}" class="btn btn-primary mb-2">
        <i class="bi bi-plus-lg me-1"></i> Buat Produk Baru
    </a>
@endrole

                    <div class="table-responsive" style="max-height: 500px;">
                        <table class="table table-bordered text-center">
                            <thead class="bg-4">
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Nama</th>

                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Stok</th>
                                    <th>Unit</th>
                                    @role('admin')
                                    <th>Aksi</th>
                                    @endrole
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->name }}</td>

                                        <td>Rp.{{ $product->purchase_price }}</td>
                                        <td>Rp.{{ $product->sale_price }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>{{ $product->unit }}</td>
                                        @role('admin')
                                        <td>
                                            <a href="{{ route('produk.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('produk.destroy', $product->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                        @endrole
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
