@extends('layouts.app')

@section('content')
    <h4 class="mb-4 fw-semibold">Dashboard</h4>

    <div class="row g-3 mb-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted mb-1">Total Peserta</h6>
                    <h2 class="text-primary mb-0">{{ $totalPeserta }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted mb-1">Total Skema Sertifikasi</h6>
                    <h2 class="text-success mb-0">{{ $totalSkema }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <h6 class="mb-3">Menu Cepat</h6>
            <a href="{{ route('peserta.index') }}" class="btn btn-primary me-2">Data Peserta</a>
            <a href="{{ route('skema.index') }}" class="btn btn-success">Data Skema</a>
        </div>
    </div>
@endsection