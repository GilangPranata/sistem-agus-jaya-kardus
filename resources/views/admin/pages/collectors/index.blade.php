@extends('admin.layouts.app')
<link rel="icon" type="image/png" href="{{ asset('img/LOGO.png') }}">
@section('title', 'Pengepul')

@section('content')
@if ($message = session('success'))
    <x-alert type="success" :message="$message" />
@endif

@if ($message = session('error'))
    <x-alert type="danger" :message="$message" />
@endif

<div class="row px-3">
    <div class="py-2 border-bottom">
        <h1 class="h1 text-center">Pengepul</h1>
    </div>

    <div class="row px-3 pt-3 pb-4 bg-white rounded shadow">
        <div class="col-lg-12">
            <div class="row g-5">
                {{-- Data Table --}}
                <div class="col-lg-12">
                    @role('admin')
                   <a href="{{ route('collector.create') }}" class="btn btn-primary mb-2"><i class="bi bi-plus-lg me-1"></i> Tambah Pengepul</a>
                    @endrole
                    <div class="table-responsive" style="max-height: 500px;">
                        <table class="table table-bordered text-center">
                            <thead class="bg-4">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Bergabung</th>
                                    <th>Kontak</th>
                                    @role('admin')
                                    <th>Aksi</th>
                                    @endrole
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($collectors as $collector)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $collector->name }}</td>
                                        <td>{{ $collector->address }}</td>
                                        {{-- return human readable --}}
                                        <td>{{ $collector->created_at->format('d M Y') }}</td>
                                        <td>{{ $collector->phone }}</td>
                                        @role('admin')
                                        <td>
                                            <a href="{{ route('collector.edit', $collector->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('collector.destroy', $collector->id) }}" method="POST" class="d-inline">
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
