@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0">Edit Skema Sertifikasi</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('skema.update', $skema->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Kode Skema <span class="text-danger">*</span></label>
                        <input type="text" name="kode_skema" class="form-control @error('kode_skema') is-invalid @enderror" 
                               value="{{ old('kode_skema', $skema->kode_skema) }}" required>
                        @error('kode_skema') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Skema <span class="text-danger">*</span></label>
                        <input type="text" name="nama_skema" class="form-control @error('nama_skema') is-invalid @enderror" 
                               value="{{ old('nama_skema', $skema->nama_skema) }}" required>
                        @error('nama_skema') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $skema->deskripsi) }}</textarea>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-warning">Update</button>
                        <a href="{{ route('skema.index') }}" class="btn btn-outline-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection