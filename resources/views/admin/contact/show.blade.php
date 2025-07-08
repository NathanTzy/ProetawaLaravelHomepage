@extends('layouts.app')

@section('title', 'Edit Kontak')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Kontak</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('contact.index') }}">Kontak</a></div>
                    <div class="breadcrumb-item active">Edit</div>
                </div>
            </div>

            <div class="section-body">
                <form action="{{ route('contact.update', $contact->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Data Kontak</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Kontak</label>
                                <input type="text" name="nama" value="{{ old('nama', $contact->nama) }}"
                                    class="form-control @error('nama') is-invalid @enderror" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Link Kontak</label>
                                <input type="url" name="link" value="{{ old('link', $contact->link) }}"
                                    class="form-control @error('link') is-invalid @enderror" required>
                                @error('link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{ route('contact.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
