@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Detail Skema Sertifikasi</h5>
                <a href="{{ route('skema.index') }}" class="btn btn-sm btn-outline-secondary">Kembali</a>
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-4">
                    <tr>
                        <th width="160" class="text-muted">Kode Skema</th>
                        <td><span class="badge bg-secondary">{{ $skema->kode_skema }}</span></td>
                    </tr>
                    <tr>
                        <th class="text-muted">Nama Skema</th>
                        <td class="fw-semibold">{{ $skema->nama_skema }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted">Deskripsi</th>
                        <td>{{ $skema->deskripsi ?? '-' }}</td>
                    </tr>
                </table>

                <a href="{{ route('skema.edit', $skema->id) }}" class="btn btn-warning">Edit Data</a>
            </div>
        </div>
    </div>
</div>
@endsection