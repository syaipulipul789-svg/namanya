@extends('layouts.app')
@section('content')
<!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Tambah penduduk</h1>
          </div>
         @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
         <div class="row">
            <div class="col">
                <form action="/resident" method="POST">
                    @csrf
                    <div class="card ">
                        <div class="card-body">
                            <div class="form-group mb-3" >
                                <label for="nik">nik</label>
                                <input type="number" inputmode="numeric" 
                                name="nik" id="nik" class="form-control">
                            </div>
                            <div class="form-group mb-3" >
                                <label for="name">Nama Lengkap</label>
                                <input type="text" inputmode="numeric"
                                 name="name" id="nama" class="form-control">
                            </div>
                            <div class="form-group mb-3" >
                                <label for="religion">Agama</label>
                                <input type="text" 
                                 name="religion" id="religion" class="form-control">
                            </div>
                            <div class="form-group mb-3" >
                                <label for="gender">jenis kelamin</label>
                                <select name ="gender" id="gender" class="form-control">
                                    <option value="">-pilih</option>
                                    <option value="male">Laki-Laki</option>
                                    <option value="female">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group mb-3" >
                                <label for="birth_place">tempat lahir</label>
                                <input type="text" 
                                 name="birth_place" id="birth_place" class="form-control">
                            </div>
                            <div class="form-group mb-3" >
                                <label for="addres">Alamat Tempat Tinggal</label>
                                <input type="alamat" 
                                 name="addres" id="addres"  class="form-control">
                            </div>
                            <div class="form-group mb-3" >
                                <label for="birth_date">tanggal lahir</label>
                                <input type="date" 
                                 name="birth_date" id="birth_date" class="form-control">
                            </div>
                            <div class="form-group mb-3" >
                                <label for="occupation">pekerjaan </label>
                                <input type="text" 
                                 name="occupation" id="occupation" class="form-control">
                            </div>
                            <div class="form-group mb-3" >
                                <label for="phone">telepon </label>
                                <input type="text" 
                                 name="phone" id="phone" class="form-control">
                            </div>
                            <div class="form-group mb-3" >
                                <label for="marital_status">status warga</label>
                                <select name="marital_status" id="marital_status" class="form-control">
                                    <option value="">-pilih</option>
                                    <option value="single">belum menikah </option>
                                    <option value="merried">sudah menikah</option>
                                    <option value="divorced">cerai</option>
                                    <option value="widowed">janda/duda</option>
                                </select> 
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-end" style="gap:10px">
                                <a href="/resident" class="btn btn-outline-secondary">
                                    kembali
                                </a>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">
                                    simpan
                                </button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
         </div>
        
@endsection