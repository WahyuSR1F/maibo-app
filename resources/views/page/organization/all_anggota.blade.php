@extends('componen.main')

@section('content1')
<section id="anggota">
    <div class="m-lg-3 m-1">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Daftar Anggota Organisasi</h4>
                  <div class="table-responsive">
                    <table class="table table-hover" id="reload-ajax">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>NIM</th>
                          <th>Nama</th>
                          <th>Prodi</th>
                          <th>Jurusan</th>
                          <th>Kampus</th>
                          <th>jabatan</th>
                          <th>status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>3621512842</td>
                          <td>Wahyu Sahri Rhamadhan</td>
                          <td>D-4 Teknologi Rekayasa Perangkat Lunak</td>
                          <td>Bisnis dan Infromatika</td>
                          <td>Politeknik Negeri Banyuwangi</td>
                          <td><label for="" class="badge badge-warning">Anggota</label></td>
                          <td><label for="" class="badge badge-success">active</label></td>
                          <td>
                            <div class="d-flex m-1 justify-content-between">
                                <a href="{{ route('viewPage',['page' => 'page.user.profile_user']) }}"><label class="badge badge-success m-1">view</label></a>
                                <a href="{{ route('viewPage',['page' => 'page.organization.edit_page']) }}"><label class="badge badge-warning m-1">Edit</label></a>
                                <a href=""><label onclick="showAlert('apakah anda yakin menghapus data ini')" class="badge badge-danger m-1">Delete</label></a>
                            </div>
                          </td>
                        </tr>
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