@extends('admin.layouts.app')

@section('title', 'Barang Masuk')

@section('content')
<div class="row px-3">
    <div class="py-2 border-bottom">
        <h1 class="h1 text-center">Transaksi Barang Masuk</h1>
    </div>
    <div class="row px-3 pt-3 pb-4 bg-white rounded">
        <div class="col-lg-12">
            <div class="row g-5">
                {{-- Data Table --}}
                <div class="col-lg-9">
                    <h4 class="text-center">Data Laptop</h4>
                    <form method="GET" class="form-group d-flex justify-content-end mb-3">
                        <input name="search" class="form-control w-25" type="text" placeholder="Search">
                        <button type="submit" class="btn btn-secondary"><i class="bi bi-search"></i></button>
                    </form>
                    <div class="table-responsive" style="max-height: 500px;">
                        <table class="table table-bordered text-center">
                            <thead class="bg-4">
                                <tr>
                                    <th>No</th>
                                    <th>ID Laptop</th>
                                    <th>Nama Laptop</th>
                                    <th>Series</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            {{-- <tbody>
                                @foreach($laptops as $index => $laptop)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $laptop->id_laptop }}</td>
                                    <td>{{ $laptop->nama_laptop }}</td>
                                    <td>{{ $laptop->series }}</td>
                                    <td>{{ $laptop->stok }}</td>
                                </tr>
                                @endforeach
                            </tbody> --}}

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>Asus</td>
                                    <td>ROG</td>
                                    <td>10</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- Form --}}
                <div class="col-lg-3">
                    <h3 class="h4 text-center">Form Barang Masuk</h3>
                    <form method="POST" action="{{ route('produk.create') }}">
                        @csrf
                        <label class="form-label mt-2">ID Laptop</label>
                        <select class="form-select" name="id_laptop">
                            {{-- @foreach($laptops as $laptop)
                                <option value="{{ $laptop->id_laptop }}">{{ $laptop->id_laptop }}</option>
                            @endforeach --}}
                        </select>
                        <label class="form-label mt-2">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control">
                        <div class="d-flex justify-content-end mt-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
