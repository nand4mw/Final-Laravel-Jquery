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
                        <label for="nama_kapal">Nama Kapal</label>
                        <input type="text" class="form-control @error('nama_kapal') is-invalid @enderror" value="{{ old('nama_kapal') }}" name="nama_kapal" id="nama_kapal">
                        <small class="text-danger"></small>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="id_pemilik">Nama Pemilik</label>
                        <select name="id_pemilik" id="id_pemilik" class="form-select @error('id_pemilik') is-invalid @enderror" value="">
                            <option value="" selected>No selected :</option>
                            @foreach ($kapal as $item)
                                    <option value="{{ $item->id_pemilik }}"> {{ $item->id_pemilik }}</option>
                            @endforeach
                            <option value=""></option>
                        </select>

                        <small class="text-danger"></small>

                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="id_dpi">Nama Dpi</label>
                        <select name="id_dpi" id="id_dpi" class="form-select @error('id_dpi') is-invalid @enderror" value="">
                            <option value="" selected>No selected :</option>
                            @foreach ($kapal as $item)
                            <option value="{{ $item->id_dpi }}">{{ $item->id_dpi }}</option>
                                
                            @endforeach
                        </select>

                        <small class="text-danger"></small>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="id_alat_tangkap">Nama Alat Tangkap</label>
                        <select name="id_alat_tangkap" id="id_alat_tangkap" class="form-select @error('') is-invalid @enderror" value="">
                            <option value="">No Selected :</option>
                            @foreach ($kapal as $item)
                            <option value="{{ $item->id_alat_tangkap }}">{{ $item->id_alat_tangkap }}</option>
                            @endforeach
                        </select>

                        <small class="text-danger"></small>

                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-6">
                    <label for="foto_kapal">Foto Kapal</label>
                    <input type="file" class="form-control  " value="" name="foto_kapal" id="foto_kapal">
                    
                    <small class="text-danger"></small>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i>Simpan</button>
            <a href="/kapal" class="btn btn-danger">Kembali</a>
        </div>
    </form>
</main>

@endsection