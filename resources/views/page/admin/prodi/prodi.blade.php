
@extends('componen.main_admin')
@section('content1')
<section id="anggota">
    <div class="m-lg-3 m-1">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Daftar Prodi</h4>
                  <a href="{{ route('prodi_create_view') }}"><button type="button" class="btn btn-primary btn-sm">Tambah</button></a>
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
                                <a href="{{ route('prodi_edit_view',['id' => $item->id]) }}"><button class="btn btn-warning btn-sm">Edit</button></a>
                                <a href="" onclick="showAlertDelete({{ $item->id }})" style="margin-left: 10px"><button class="btn btn-danger btn-sm">Delete</button></a>
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