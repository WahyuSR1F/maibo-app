@extends('componen.main_admin')
@section('content1')
<section id="anggota">
    <div class="m-lg-3 m-1">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Daftar Prodi</h4>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Prodi</th>
                          <th>Nama Jurusan</th>
                          <th>Nama Kampus</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                            $i=1
                        @endphp

                        @foreach ( $prodi as $item)
                           <tr>
                          <td>{{ $i }}</td>
                          <td>{{ $item->nama_prodi }}</td>
                          <td >{{ $item->nama_jurusan }}</td>
                          <td>{{ $item->nama_kampus }}</td>
                           <td>
                            <div class="d-flex m-1 justify-content-start">
                                <a href=""><label class="badge badge-success m-1">view</label></a>
                                <a href=""><label class="badge badge-warning m-1">Edit</label></a>
                                <a href="" onclick="showAlert('apakah anda yakin menghapus data ini')"><label class="badge badge-danger m-1">Delete</label></a>
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