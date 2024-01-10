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
                        <label for="nama_dpi">Nama Dpi</label>
                        <input type="text" class="form-control @error('nama_dpi') is-invalid @enderror" value="{{ old('nama_dpi') }}" name="nama_dpi" id="nama_dpi">
                        <small class="text-danger"></small>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="luas">Luas </label>
                        <input type="text" class="form-control @error('luas') is-invalid @enderror" value="{{ old('luas') }}" name="luas" id="luas">

                        <small class="text-danger"></small>

                    </div>
                </div>           
            </div>
            
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i>Simpan</button>
            <a href="/dpi" class="btn btn-danger">Kembali</a>
        </div>
    </form>
</main>

@endsection