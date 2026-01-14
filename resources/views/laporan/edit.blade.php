@extends('layouts.app')

@section('content')
<div class="card shadow">
    <div class="card-body">
        <h4 class="mb-3">Sampaikan Laporan</h4>

        <form action="{{ route('laporan.update', ['id'=>$laporan->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Judul Laporan</label>
                <input type="text" name="judul" value="{{ $laporan->judul }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Kategori</label>
                <select name="kategori" class="form-control">
                    <option {{ $laporan->kategori == 'Keamanan' ? 'selected' : '' }} value="Keamanan">Keamanan</option>
                    <option {{ $laporan->kategori == 'Lingkungan' ? 'selected' : '' }} value="Lingkungan">Lingkungan</option>
                    <option {{ $laporan->kategori == 'Sosial' ? 'selected' : '' }} value="Sosial">Sosial</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Isi Laporan</label>
                <textarea name="isi_laporan" class="form-control" rows="4">{{ $laporan->isi_laporan }}</textarea>
            </div>

            <div class="mb-3">
                <label>Nama Pelapor</label>
                <input type="text" name="nama_pelapor" value="{{ $laporan->nama_pelapor }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>No HP</label>
                <input type="text" name="no_hp" value="{{ $laporan->no_hp }}" class="form-control">
            </div>

            <img src="{{ '/storage/'.$laporan->bukti }}" width="200" alt="">
            <div class="mb-3">
                <label>Kirim Bukti</label>
                <input type="file" name="bukti" class="form-control">
            </div>

            @if (Auth::user()->role == 'admin')
            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option {{ $laporan->status == 'proses' ? 'selected' : '' }} value="proses">Proses</option>
                    <option {{ $laporan->status == 'selesai' ? 'selected' : '' }} value="selesai">Selesai</option>
                    <option {{ $laporan->status == 'ditolak' ? 'selected' : '' }} value="ditolak">Ditolak</option>
                </select>
            </div>
            @endif

            <button class="btn btn-primary">Kirim Laporan</button>
            <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
