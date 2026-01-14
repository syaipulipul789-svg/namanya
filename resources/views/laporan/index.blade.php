@extends('layouts.app')

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<h4 class="mb-3"> Laporan Warga</h4>
<div class="card shadow">
    <div class="card-body">
        <a href="{{ route('laporan.create') }}" class="btn btn-primary mb-3" >Buat Laporan</a>
        <table class=" table table-bordered table-hover">
             <thead>
                <tr>
                    <td>Judul</td>
                    <td>Kategori</td>
                    <td>Nama Pelapor</td>
                    <td>Status</td>
                    <td>Tanggal</td>
                </tr>
            </thead>
            <tbody>
                @foreach($laporans as $laporan)
                <tr>
                    <td>{{ $laporan->judul }}</td>
                    <td>{{ $laporan->kategori }}</td>
                    <td>{{ $laporan->nama_pelapor }}</td>
                    <td>
                        <span class="badge badge-warning">
                            {{ $laporan->status }}
                        </span>
                    </td>
                    <td>{{ $laporan->created_at->format('d-m-Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
