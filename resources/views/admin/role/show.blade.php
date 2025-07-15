@extends('layouts.app')

@section('title', 'Edit Role')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Role</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('role.index') }}">Role</a></div>
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

                <form action="{{ route('role.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Data Role</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Role</label>
                                <input type="text" name="role" value="{{ old('role', $role->role) }}"
                                    class="form-control @error('role') is-invalid @enderror" required>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Penjelasan Singkat</label>
                                <textarea name="penjelasan" rows="3" class="form-control @error('penjelasan') is-invalid @enderror" required>{{ old('penjelasan', $role->penjelasan) }}</textarea>
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
                                <label>Link WhatsApp / Join</label>
                                <input type="url" name="link" value="{{ old('link', $role->link) }}"
                                    class="form-control @error('link') is-invalid @enderror" required>
                                @error('link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="card-footer text-right">
                            <a href="{{ route('role.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                        </div>
                    </div>
                </form>

            </div>
        </section>
    </div>
@endsection
