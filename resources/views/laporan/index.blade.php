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
                    <td>Bukti</td>
                    <td>Judul</td>
                    <td>Kategori</td>
                    <td>Nama Pelapor</td>
                    <td>Status</td>
                    <td>Tanggal</td>
                    <td>edit</td>

                </tr>
            </thead>
            <tbody>
                @foreach($laporans as $laporan)
                <tr>
                    <td>
                        <img src="{{ 'storage/'.$laporan->bukti }}" width="200" alt="">
                    </td>
                    <td>{{ $laporan->judul }}</td>
                    <td>{{ $laporan->kategori }}</td>
                    <td>{{ $laporan->nama_pelapor }}</td>
                    <td>
                        @if ($laporan->status == 'proses')
                        <span class="badge badge-warning">
                            {{ $laporan->status }}
                        </span>
                        @elseif ($laporan->status == 'selesai')
                        <span class="badge badge-success">
                            {{ $laporan->status }}
                        </span>
                        @else
                        <span class="badge badge-danger">
                            {{ $laporan->status }}
                        </span>
                        @endif
                    </td>
                    <td>{{ $laporan->created_at->format('d-m-Y') }}</td>
                    <td>
                        <a href="{{ route('laporan.edit', ['id'=>$laporan->id]) }}" class="btn btn-sm btn-warning mr-1">
                            <i class="fa fa-pen"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
