@extends('layouts.app')

@section('title', 'Daftar Role')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Daftar Role</h1>
                <div class="section-header-button">
                    <a href="{{ route('role.create') }}" class="btn btn-primary">Tambah Role</a>
                </div>
            </div>

            <div class="section-body">
                {{-- Alert Sukses --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        {{ session('success') }}
                        <button class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif

                {{-- Tabel Role --}}
                <div class="card">
                    <div class="card-header">
                        <h4>Data Role</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Role</th>
                                    <th>Penjelasan</th>
                                    <th>Link WA</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($role as $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $role->role }}</td>
                                        <td>{{ $role->penjelasan }}</td>
                                        <td>
                                            <a href="{{ $role->link }}" target="_blank" class="btn btn-sm btn-success">
                                                Join
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('role.edit', $role->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('role.destroy', $role->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus role ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">Belum ada data role yang ditambahkan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
