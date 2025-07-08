@extends('layouts.app')

@section('title', 'Edit Testimoni')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Testimoni</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('testymoni.index') }}">Testimoni</a></div>
                <div class="breadcrumb-item active">Edit</div>
            </div>
        </div>

        <div class="section-body">

            {{-- Alert jika ada error --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible show fade">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                    <button class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif

            {{-- Alert jika sukses --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    {{ session('success') }}
                    <button class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif

            <form action="{{ route('testymoni.update', $testimony->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card">
                    <div class="card-header">
                        <h4>Edit Data Testimoni</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" value="{{ old('nama', $testimony->nama) }}" class="form-control @error('nama') is-invalid @enderror" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Umur</label>
                            <input type="number" name="umur" value="{{ old('umur', $testimony->umur) }}" class="form-control @error('umur') is-invalid @enderror" required>
                            @error('umur')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Asal</label>
                            <input type="text" name="asal" value="{{ old('asal', $testimony->asal) }}" class="form-control @error('asal') is-invalid @enderror" required>
                            @error('asal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Isi Testimoni</label>
                            <textarea name="testimoni" class="form-control @error('testimoni') is-invalid @enderror" rows="4" required>{{ old('testimoni', $testimony->testimoni) }}</textarea>
                            @error('testimoni')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Gambar Saat Ini --}}
                        <div class="form-group">
                            <label>Foto Saat Ini</label><br>
                            @if ($testimony->foto && file_exists(public_path('uploads/testimonies/' . $testimony->foto)))
                                <img src="{{ asset('uploads/testimonies/' . $testimony->foto) }}" alt="Foto Testimoni" width="150" class="img-thumbnail mb-2">
                            @else
                                <p class="text-muted">Tidak ada foto.</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Ganti Foto (Opsional)</label>
                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                            @error('foto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <a href="{{ route('testymoni.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </div>
                </div>
            </form>

        </div>
    </section>
</div>
@endsection
