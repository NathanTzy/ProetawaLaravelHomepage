@extends('layouts.app')

@section('title', 'Daftar Sertifikat')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Sertifikat</h1>
            <div class="section-header-button">
                <a href="{{ route('certificates.create') }}" class="btn btn-primary">Tambah Sertifikat</a>
            </div>
        </div>

        <div class="section-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Data Sertifikat</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Tanggal Keluar</th>
                                <th>Penerbit</th>
                                <th>Guna</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($certificates as $c)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $c->nama }}</td>
                                    <td>{{ $c->tanggal_keluar }}</td>
                                    <td>{{ $c->penerbit }}</td>
                                    <td>{{ $c->guna }}</td>
                                    <td>
                                        @if ($c->img)
                                            <img src="{{ asset('storage/' . $c->img) }}" alt="Gambar Sertifikat" width="100">
                                        @else
                                            <span class="text-muted">Tidak ada gambar</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('certificates.edit', $c->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('certificates.destroy', $c->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Belum ada sertifikat yang ditambahkan.</td>
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
