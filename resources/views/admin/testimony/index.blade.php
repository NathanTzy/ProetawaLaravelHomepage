@extends('layouts.app')

@section('title', 'Daftar Testimoni')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Daftar Testimoni</h1>
                <div class="section-header-button">
                    <a href="{{ route('testymoni.create') }}" class="btn btn-primary">Tambah Testimoni</a>
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

                {{-- Tabel Testimoni --}}
                <div class="card">
                    <div class="card-header">
                        <h4>Data Testimoni</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Asal</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($testimonies as $t)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $t->nama }}</td>
                                        <td>{{ $t->asal }}</td>
                                        <td>
                                            @if ($t->foto && file_exists(public_path('uploads/testimonies/' . $t->foto)))
                                                <img src="{{ asset('uploads/testimonies/' . $t->foto) }}"
                                                    alt="Foto Testimoni" width="100" class="img-thumbnail">
                                            @else
                                                <span class="text-muted">Tidak ada foto</span>
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{ route('testymoni.edit', $t->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('testymoni.destroy', $t->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus testimoni ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">Belum ada testimoni yang
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
