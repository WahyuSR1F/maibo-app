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
<section id="anggota">
    <div class="m-lg-3 m-1">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Daftar Jurusan</h4>
                  <a href="{{ route('jurusan_create') }}"><button type="button" class="btn btn-primary btn-sm">Tambah Data <span class="mdi mt-1"><ion-icon name="add-circle-outline"></ion-icon></span></button></a>
                  
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Jurusan</th>
                          <th>Nama Kampus</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                            $i=1;
                        @endphp
                  
                        @foreach ($jurusan as $item)
                         <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->nama_jurusan }}</td>
                            <td>{{ $item->nama_kampus }}</td>
                            <td>
                              <div class="d-flex m-1 justify-content-start">
                                 <a href="{{ route('jurusan_edit_view',['id'=> $item->id]) }}"> <button class="btn  btn-warning btn-sm">Edit</button></a>
                                 <button onclick="showAlertDelete({{ $item->id }})" class="btn btn-danger btn-sm" style="margin-left: 10px">Delete</button>
                              </div>
                              </td>
                          </tr>  
                          @php
                              $i++;
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
</section>
@endsection