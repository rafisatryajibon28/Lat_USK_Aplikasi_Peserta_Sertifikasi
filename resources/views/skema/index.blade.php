@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0 fw-semibold">Data Skema Sertifikasi</h4>
    <a href="{{ route('skema.create') }}" class="btn btn-success btn-sm">
        + Tambah Skema
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3" width="60">No</th>
                        <th>Kode Skema</th>
                        <th>Nama Skema</th>
                        <th width="220" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($skemas as $i => $skema)
                        <tr>
                            <td class="ps-3">{{ $i + 1 }}</td>
                            <td><span class="badge bg-secondary">{{ $skema->kode_skema }}</span></td>
                            <td>{{ $skema->nama_skema }}</td>
                            <td class="text-center">
                                <a href="{{ route('skema.show', $skema->id) }}" class="btn btn-sm btn-outline-info">Detail</a>
                                <a href="{{ route('skema.edit', $skema->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                <form action="{{ route('skema.destroy', $skema->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">Belum ada data skema</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection