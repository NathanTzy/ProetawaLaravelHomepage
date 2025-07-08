@extends('layouts.app')

@section('title', 'Daftar Kontak')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Kontak</h1>
            <div class="section-header-button">
                <a href="{{ route('contact.create') }}" class="btn btn-primary">Tambah Kontak</a>
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
                    <h4>Data Kontak</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Link</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($contacts as $contact)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $contact->nama }}</td>
                                    <td>
                                        <a href="{{ $contact->link }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                            Kunjungi
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kontak ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Belum ada kontak yang ditambahkan.</td>
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
