@extends('layouts.app')

@section('title', 'Daftar Shop')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Daftar Shop</h1>
                <div class="section-header-button">
                    <a href="{{ route('shop.create') }}" class="btn btn-primary">Tambah Shop</a>
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

                {{-- Tabel Shop --}}
                <div class="card">
                    <div class="card-header">
                        <h4>Data Shop</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Link</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($shops as $s)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $s->nama }}</td>
                                        <td>
                                            <a href="{{ $s->link }}" target="_blank" class="btn btn-sm btn-info">
                                                Kunjungi
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('shop.edit', $s->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('shop.destroy', $s->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus shop ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">Belum ada data shop yang
                                            ditambahkan.</td>
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
