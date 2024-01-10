@extends('layouts.template')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
    @include('layouts.navigation')

    <form action="" method="post" class="card col-lg-11 ms-lg-5 mt-5  bg-white ">
        @csrf

        <div class="card-body">

            <div class="row mt-2">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="nim_mahasiswa">Tambah Alat Tangkap</label>
                        <input type="text" class="form-control @error('nim_mahasiswa') is-invalid @enderror" value="{{ old('nim_mahasiswa') }}" name="nim_mahasiswa" id="nim_mahasiswa">
                        <small class="text-danger"></small>
                    </div>
                </div>
               
            </div>
          
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i>Simpan</button>
            <a href="/alat-tangkap" class="btn btn-danger">Kembali</a>
        </div>
    </form>
</main>

@endsection