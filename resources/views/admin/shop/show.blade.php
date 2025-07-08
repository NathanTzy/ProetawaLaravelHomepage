@extends('layouts.app')

@section('title', 'Edit Shop')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Shop</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('shop.index') }}">Shop</a></div>
                    <div class="breadcrumb-item active">Edit</div>
                </div>
            </div>

            <div class="section-body">

                {{-- Alert jika error --}}
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

                <form action="{{ route('shop.update', $shop->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Data Shop</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Shop</label>
                                <input type="text" name="nama" value="{{ old('nama', $shop->nama) }}"
                                    class="form-control @error('nama') is-invalid @enderror" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Link Shop</label>
                                <input type="url" name="link" value="{{ old('link', $shop->link) }}"
                                    class="form-control @error('link') is-invalid @enderror" required>
                                @error('link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="card-footer text-right">
                            <a href="{{ route('shop.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                        </div>
                    </div>
                </form>

            </div>
        </section>
    </div>
@endsection
