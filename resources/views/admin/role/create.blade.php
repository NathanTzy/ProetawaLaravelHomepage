@extends('layouts.app')

@section('title', 'Tambah Role')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Role</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('role.index') }}">Role</a></div>
                    <div class="breadcrumb-item active">Tambah</div>
                </div>
            </div>

            <div class="section-body">

                {{-- Notifikasi --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        {{ session('success') }}
                        <button class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif

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

                {{-- Form --}}
                <form action="{{ route('role.store') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Role</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Role</label>
                                <input type="text" name="role"
                                    class="form-control @error('role') is-invalid @enderror" value="{{ old('nama') }}"
                                    required>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Penjelasan</label>
                                <textarea name="penjelasan" class="form-control @error('penjelasan') is-invalid @enderror" rows="3" required>{{ old('penjelasan') }}</textarea>
                                @error('penjelasan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Syarat</label>
                                <textarea name="syarat" rows="4" class="form-control @error('syarat') is-invalid @enderror" required>{{ old('syarat', $role->syarat ?? '') }}</textarea>
                                @error('syarat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label>Link WhatsApp</label>
                                <input type="url" name="link"
                                    class="form-control @error('link') is-invalid @enderror" value="{{ old('link') }}"
                                    required>
                                @error('link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="card-footer text-right">
                            <a href="{{ route('role.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
@endpush
