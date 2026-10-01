@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Detail Peserta</h5>
                <a href="{{ route('peserta.index') }}" class="btn btn-sm btn-outline-secondary">Kembali</a>
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-4">
                    <tr>
                        <th width="180" class="text-muted">Nama Lengkap</th>
                        <td class="fw-semibold">{{ $peserta->nama }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted">NIK</th>
                        <td>{{ $peserta->nik }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted">Email</th>
                        <td>{{ $peserta->email ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted">No. HP</th>
                        <td>{{ $peserta->no_hp ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted">Alamat</th>
                        <td>{{ $peserta->alamat ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted">Skema Sertifikasi</th>
                        <td>{{ $peserta->skema->kode_skema ?? '-' }} - {{ $peserta->skema->nama_skema ?? '-' }}</td>
                    </tr>
                </table>

                <a href="{{ route('peserta.edit', $peserta->id) }}" class="btn btn-warning">Edit Data</a>
            </div>
        </div>
    </div>
</div>
@endsection