@extends('layouts.app')

@section('title', 'Edit Sertifikat')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Sertifikat</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('certificates.index') }}">Sertifikat</a></div>
                    <div class="breadcrumb-item active">Edit</div>
                </div>
            </div>

            <div class="section-body">
                <form action="{{ route('certificates.update', $certificate->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Data Sertifikat</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Sertifikat</label>
                                <input type="text" name="nama" value="{{ old('nama', $certificate->nama) }}"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Keluar</label>
                                <input type="date" name="tanggal_keluar"
                                    value="{{ old('tanggal_keluar', $certificate->tanggal_keluar) }}" class="form-control"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Dikeluarkan Oleh</label>
                                <input type="text" name="penerbit" value="{{ old('penerbit', $certificate->penerbit) }}"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Guna Sertifikat</label>
                                <textarea name="guna" class="form-control" rows="3" required>{{ old('guna', $certificate->guna) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Gambar Saat Ini</label><br>
                                @if ($certificate->img && file_exists(public_path('storage/' . $certificate->img)))
                                    <img src="{{ asset('storage/' . $certificate->img) }}" alt="Gambar Sertifikat" width="100">
                                @else
                                    <p class="text-muted">Tidak ada gambar.</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Ganti Gambar (opsional)</label>
                                <input type="file" name="img" class="form-control" accept="image/*">
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{ route('certificates.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
