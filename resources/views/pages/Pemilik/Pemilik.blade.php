@extends('layouts.Template')
@section('content')



<main
class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg"
>
<!-- Navbar -->
@include('layouts.navigation')
<!-- End Navbar -->
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <a href="/tambah-data-pemilik" class="btn btn-primary">Tambah Data + </a>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                    <th
                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                  >
                    No
                  </th>
                  <th
                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                  >
                    Nama
                  </th>
                  <th
                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                  >
                    Alamat
                  </th>
                  <th
                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                  >
                    No Telepon
                  </th>
                  <th
                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                  >
                    Waktu TerData
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">aksi</th>
                </tr>
              </thead>
              <tbody>
               
                @foreach ($pemilik as $item)
                    
               
                <tr>
                    <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"
                          >{{ $no++ }}</span
                        >
                      </td>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div>
                        {{-- <img
                          src="../assets/img/team-4.jpg"
                          class="avatar avatar-sm me-3"
                          alt="user6"
                        /> --}}
                      </div>
                      <div
                        class="d-flex flex-column justify-content-center"
                      >
                        {{-- <h6 class="mb-0 text-sm">Miriam Eric</h6> --}}
                        <p class="text-xs text-secondary mb-0">
                          {{ $item->nama_pemilik }}
                        </p>
                      </div>
                    </div>
                  </td>
                  <td >
                    
                    <p class="text-xs text-secondary mb-0">{{ $item->alamat }}</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class=" badge-sm text-secondary text-xs"
                      >{{ $item->no_hp }}</span
                    >
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold"
                      >{{ $item->updated_at }}</span
                    >
                  </td>
                  <td class="align-middle  text-center d-flex justify-content-center  align-items-center">
                    <a
                      href="/edit-pemilik/{{ $item->id_pemilik }}/edit"
                      class="text-white font-weight-bold text-xs btn btn-warning"
                      data-toggle="tooltip"
                      data-original-title="Edit user"
                    >
                      Edit
                    </a>|

                    <form action="{{ route('hapusPemilik', ['id' => $item->id_pemilik]) }}" class="" method="post" id="form-hapus" >
                      @csrf
                      @method('DELETE')
                      <button type="button" class=" font-weight-bold text-xs btn btn-danger " onclick="hapusData({{ $item->id_pemilik }})">Hapus</button>
                  </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div> 
</div>
</main>

<script>
  function hapusData(id_pemilik) {
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
              const inputIdPemilik = document.createElement('input');
              inputIdPemilik.type = 'hidden';
              inputIdPemilik.name = 'id_pemilik';
              inputIdPemilik.value = id_pemilik;
              form.appendChild(inputIdPemilik);

              form.submit();
          }
      });
  }
</script>

@endsection

