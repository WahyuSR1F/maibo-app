

@extends('componen.main_admin')
@section('content1')
<section id="anggota">
    <div class="m-lg-3 m-1">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Daftar User</h4>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Foto</th>
                          <th>Username</th>
                          <th>Role</th>
                          <th>begabung pada</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                            $i =1 ;
                        @endphp
                        @foreach ($user as $item)
                        <tr>
                          <td>{{ $i }}</td>
                          <td><img class="img-xls rounded" src="{{ $item->foto_profile }}" alt=""></td>
                          <td>{{ $item->username }}</td>
                          <td>{{ $item->nama_role }}</td>
                          <td>{{ $item->created_at }}</td>
                           <td>
                            <div class="d-flex m-1 justify-content-start">
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