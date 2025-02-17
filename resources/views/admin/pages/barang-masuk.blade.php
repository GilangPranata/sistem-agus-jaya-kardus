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
                <div class="col-lg-12">
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
            </div>
        </div>
    </div>
</div>
@endsection
