@extends('layouts.app')

@section('title', 'Tambah Kontak')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Kontak</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('contact.index') }}">Kontak</a></div>
                <div class="breadcrumb-item active">Tambah</div>
            </div>
        </div>

        <div class="section-body">

            {{-- Alert sukses --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    {{ session('success') }}
                    <button class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif

            {{-- Alert error --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible show fade">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4>Form Kontak</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Kontak</label>
                            <input type="text" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Link Kontak</label>
                            <input type="url" name="link" value="{{ old('link') }}" class="form-control @error('link') is-invalid @enderror" required>
                            @error('link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{ route('contact.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>

        </div>
    </section>
</div>
@endsection
