@extends('layouts.template')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
    @include('layouts.navigation')


    <form action="" method="post" class="card col-lg-11 ms-lg-5 mt-5  bg-white ">
        @csrf

        <div class="card-body">
            <div class="row mt-2">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="nama_pemilik">Nama Pemilik</label>
                        <input type="text" class="form-control " value="{{ $pemilik->nama_pemilik }}" name="nama_pemilik" id="nama_pemilik">
                        <small class="text-danger"></small>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control " value="{{ $pemilik->alamat }}" name="alamat" id="alamat">
                        <small class="text-danger"></small>
                    </div>
                </div>
                
            </div>
            <div class="row mt-2">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="no_hp">No. Hp</label>
                        <input type="text" class="form-control " value="{{ $pemilik->no_hp }}" name="no_hp" id="no_hp">

                        <small class="text-danger"></small>

                    </div>
                </div>
               
            </div>
           
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i>Simpan</button>
            <a href="/edit-pemilik" class="btn btn-danger">Kembali</a>
        </div>
    </form>
</main>

@endsection