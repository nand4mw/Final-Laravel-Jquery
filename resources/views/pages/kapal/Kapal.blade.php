@extends('layouts.Template')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
  <!-- Navbar -->
  @include('layouts.navigation')
  <!-- End Navbar -->
  <div class="container  py-4  ">
    <div class="mt-4">
      <div class="card">
        <div class="card-header pb-0 px-3">
          <a href="/tambah-kapal" class="mb-0 text-bold btn btn-primary">Tambah Data +</a>
        </div>
        <div class="card-body pt-4 p-3">

          <ul class="list-group">

            @foreach ($data as $item)
              
            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
              <div class="d-flex flex-column">
                <div class="d-flex">
                  <div class="" style=" ">
                    <img src="/assets/img/kapal1.jpg" class="" style="width: 210px; background-position: center; background-size: cover; background-size: cover; background-repeat: no-repeat  height: 100px; margin-right: 20px; background-color: red" alt="...">
                </div>
                  <div class="d-flex  flex-column">
                    <h6 class="mb-3 text-sm">{{ $item->nama_kapal }}</h6>
                    <span class="mb-2 text-xs">Pemilik :
                      <span class="text-dark font-weight-bold ms-sm-2">{{ $item->nama_pemilik }}</span></span>
                    <span class="mb-2 text-xs">Daerah Penagkapan Ikan :
                      <span class="text-dark ms-sm-2 font-weight-bold">{{ $item->nama_dpi }}</span></span>
                    <span class="text-xs">Alat Tangkap:
                      <span class="text-dark ms-sm-2 font-weight-bold">{{ $item->nama_alat_tangkap }}</span></span>
                  </div>

                </div>
              </div>
              <div class="ms-auto text-end">
                <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="far fa-trash-alt me-2"></i>Delete</a>
                <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
              </div>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
   
    <footer class="footer pt-3">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
           
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="https://creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
</main>

@endsection