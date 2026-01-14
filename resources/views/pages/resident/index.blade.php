@extends('layouts.app')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Penduduk</h1>
    <a href="/resident/create" class="btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
    </a>
</div>

<!-- Table -->
<div class="row">
        <div class="card shadow">
            <div class="card-body">

                <!-- WRAPPER SCROLL -->
                <div class="table-responsive" style="overflow-x:auto;">
                    <table class="table table-bordered table-hover" style="min-width:1200px;">
                        <thead class="thead-light">
                            <tr>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Agama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat / Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>No. HP</th>
                                <th>Status Penduduk</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($residents as $resident)
                            <tr>
                                <td>{{ $resident->nik }}</td>
                                <td>{{ $resident->name }}</td>
                                <td>{{ $resident->religion }}</td>
                                <td>{{ $resident->gender }}</td>
                                <td>{{ $resident->birth_date }}</td>
                                <td>{{ $resident->birth_place }}</td>
                                <td>{{ $resident->phone }}</td>
                                <td>{{ $resident->status }}</td>
                                <td class="text-nowrap">
                                    <a href="{{ route('resident-edit', ['id'=>$resident->id]) }}" class="btn btn-sm btn-warning mr-1">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger" href="{{ route('resident-delete', ['id'=>$resident->id]) }}" onclick="return confirm('Yakin mau hapus ?')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="9">
                                        Tidak ada data
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
                <!-- END SCROLL -->

            </div>
        </div>
</div>

@endsection