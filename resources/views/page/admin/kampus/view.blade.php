
@extends('componen.main_admin')
@section('content1')
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: '{{ session('success') }}'
        });
    </script>
@endif
@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'maaf kesalahan server, mohon diulang kembali',
            text: '{{ session('success') }}'
        });
    </script>
@endif
    <div class="m-lg-3 m-1">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 
                    <h4 class="card-title">Daftar Kampus</h4>
                    <div class="w-100">
                    <button type="button" class="btn btn-sm btn-primary m-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Tambah <span class="pt-3"> <ion-icon name="add-outline"></ion-icon></span>
                    </button>
                  
                    </div>
               
                  
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Kampus</th>
                          <th>Action</th>
                        </tr>
                       
                      </thead>
                      <tbody>

                    @php
                        $i=1;
                    @endphp
                    @foreach ($kampus as $item)
                        <tr>
                              <td>{{ $i }}</td>
                              <td>{{ $item->nama_kampus }}</td>
                              <td>
                                <div class="d-flex m-1 justify-content-start">
                                  <a href="{{ route('kampus_edit',['id' => $item->id]) }}" onclick="showAlertEdit({{ $item->id }})">
                                    <button class="btn btn-warning btn-sm " style="margin-left: 5px">
                                      Edit
                                    </button>
                                  </a>
                                    <a onclick="showAlertDelete({{ $item->id }})" >
                                      <button class="btn btn-danger btn-sm " style="margin-left: 5px">
                                        
                                         Delete
                                      </button>
                                    </a>
                                </div>
                                </td>
                            </tr>
                         @php
                             $i++
                         @endphp 
                    @endforeach
                     
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>



<!-- Modal -->
<div class="modal fade shadow-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLabel2">Daftarkan Kampus</h5>
      </div>
      <div class="modal-body">
        <p class="text-danger">*Perhatikan dalam pengisian nama kampus</p>
        <form id="form-create" action="{{ route('kampus_create') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nama Kampus</label>
            <input type="text" class="form-control" id="recipient-name" name="nama_kampus" required>
          </div>
          <div class="modal-footer ">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            <button type="button"  onclick="showAlertCreate()"   class="btn btn-primary btn-sm">Simpan</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>


    
@endsection

