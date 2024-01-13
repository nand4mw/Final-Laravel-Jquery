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
                  <div style="width: 210px; height: 100px; margin-right: 20px;  overflow: hidden;">
                    @if ($item->foto_kapal)
                    <img src="{{ asset('storage/'. $item->foto_kapal) }}" style="width: 100%; height: 100%; object-fit: cover;" alt="..." class="rounded rounded-3">
                    @endif
                  </div>
                  <div class="d-flex  flex-column">
                    <h6 class="mb-3 text-sm">{{ $item->nama_kapal }}</h6>
                    <span class="mb-2 text-xs">Pemilik :
                      <span class="text-dark font-weight-bold ms-sm-2">{{ $item->nama_pemilik }}</span></span>
                    <span class="mb-2 text-xs">Daerah Penagkapan Ikan :
                      <span class="text-dark ms-sm-2 font-weight-bold">{{ $item->nama_dpi }}</span></span>
                    <span class="text-xs">Alat Tangkap:
                      <span class="text-dark ms-sm-2 font-weight-bold">{{ $item->nama_alat_tangkap }}</span>
                    </span>

                  </div>

                </div>
              </div>
              <div class="ms-auto text-end">
                {{-- ================= Detail Alert ================== --}}
                <a href="{{ route('kapal.modal', ['id' => $item->id_kapal]) }}" type="button" class="btn btn-link text-dark px-3 mb-0 text-success" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id_kapal }}">
                  <i class="fas fa-solid fa-bars text-dark me-2" aria-hidden="true"></i>Detail
                </a>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{ $item->id_kapal }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content" class="d-flex align-middle flex-row  ">
                      <div class="modal-header">
                        <h1 class="modal-title  fs-6" id="exampleModalLabel">Detail {{ $item->nama_kapal }} </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body text-start">

                        @if ($item->foto_kapal)
                        <img src="{{ asset('storage/'. $item->foto_kapal) }}" style="width: 100%; height: 100%; object-fit: cover;" alt="..." class="rounded rounded-3">
                        @endif
                        <div class="mt-3">
                          <span class="fs-5 ">Nama Kapal : <span class="fw-bold"> {{ $item->nama_kapal }} </span></span><br>
                          <span class="fs-5">Pemilik : <span class="fw-bold"> {{ $item->nama_pemilik }}</span></span><br>
                          <span class="fs-5">Daerah Penangkapan : <span class="fw-bold"> {{ $item->nama_dpi }} </span></span><br>
                          <span class="fs-5">Alat Tangkap : <span class="fw-bold"> {{ $item->nama_alat_tangkap }} </span>
                          </span><br>
                          <span class="fs-5">No Hp : <span class="fw-bold"> {{ $item->no_hp }} </span>
                          </span>
                        </div>
                        <!-- Tambahkan detail lainnya sesuai kebutuhan -->


                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Download Pdf</button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- end detail  -->
                {{-- ================= End Detail Alert ================== --}}

                <td class="align-middle text-center">
                <td class="align-middle  text-center d-flex justify-content-center  align-items-center">
                  <a href="/edit-kapal/{{ $item->id_kapal }}/edit" class="btn btn-link text-dark px-3 mb-0" data-toggle="tooltip" data-original-title="Edit user"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>
                    Edit
                  </a>

                  <form action="{{ route('hapusKapal', ['id' => $item->id_kapal]) }}" class="" method="post" id="form-hapus">
                    @csrf
                    @method('DELETE')
                <button type="button" class="btn btn-link text-danger text-gradient px-3 mb-0" onclick="hapusData({{ $item->id_kapal }})">
                  <i class="far fa-trash-alt me-2"></i>Hapus</button>
                  </form>
                </td>

                </td>



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

<script>
  function hapusData(id_kapal) {
      Swal.fire({
          title: 'Apakah Anda yakin?',
          text: 'Data akan dihapus secara permanen!',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Hapus!',
          cancelButtonText: 'Batal'
      }).then((result) => {
          if (result.isConfirmed) {
              // Menambahkan input tersembunyi untuk menyertakan id_pemilik
              const form = document.getElementById('form-hapus');
              const inputKapal = document.createElement('input');
              inputKapal.type = 'hidden';
              inputKapal.name = 'id_kapal';
              inputKapal.value = id_kapal;
              form.appendChild(inputKapal);

              form.submit();
          }
      });
  }
</script>
@endsection