@extends('layouts.app')

@section('content')
<div class="card shadow">
    <div class="card-body">
        <h4 class="mb-3">Sampaikan Laporan</h4>

        <form action="{{ route('laporan.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Judul Laporan</label>
                <input type="text" name="judul" class="form-control">
            </div>

            <div class="mb-3">
                <label>Kategori</label>
                <select name="kategori" class="form-control">
                    <option value="Keamanan">Keamanan</option>
                    <option value="Lingkungan">Lingkungan</option>
                    <option value="Sosial">Sosial</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Isi Laporan</label>
                <textarea name="isi_laporan" class="form-control" rows="4"></textarea>
            </div>

            <div class="mb-3">
                <label>Nama Pelapor</label>
                <input type="text" name="nama_pelapor" class="form-control">
            </div>

            <div class="mb-3">
                <label>No HP</label>
                <input type="text" name="no_hp" class="form-control">
            </div>

            <button class="btn btn-primary">Kirim Laporan</button>
            <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
    