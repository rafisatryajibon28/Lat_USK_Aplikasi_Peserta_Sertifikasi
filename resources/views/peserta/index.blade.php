@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0 fw-semibold">Data Peserta Sertifikasi</h4>
    <a href="{{ route('peserta.create') }}" class="btn btn-primary btn-sm">+ Tambah Peserta</a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card shadow-sm mb-3">
    <div class="card-body">
        <form action="{{ route('peserta.index') }}" method="GET" class="row g-2">
            <div class="col-md-8">
                <input type="text" name="search" class="form-control" placeholder="Cari nama, NIK, atau email..." value="{{ $search ?? '' }}">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-secondary">Cari</button>
                @if(!empty($search))
                    <a href="{{ route('peserta.index') }}" class="btn btn-outline-secondary">Reset</a>
                @endif
            </div>
        </form>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3" width="60">No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Email</th>
                        <th>No. HP</th>
                        <th>Alamat</th>
                        <th>Skema</th>
                        <th width="220" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pesertas as $i => $peserta)
                        <tr>
                            <td class="ps-3">{{ $i + 1 }}</td>
                            <td>{{ $peserta->nama }}</td>
                            <td>{{ $peserta->nik }}</td>
                            <td>{{ $peserta->email ?? '-' }}</td>
                            <td>{{ $peserta->no_hp ?? '-' }}</td>
                            <td>{{ $peserta->alamat ?? '-' }}</td>
                            <td>{{ $peserta->skema->nama_skema ?? '-' }}</td>
                            <td class="text-center">
                                <a href="{{ route('peserta.show', $peserta->id) }}" class="btn btn-sm btn-outline-info">Detail</a>
                                <a href="{{ route('peserta.edit', $peserta->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                <form action="{{ route('peserta.destroy', $peserta->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">Belum ada data peserta</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection