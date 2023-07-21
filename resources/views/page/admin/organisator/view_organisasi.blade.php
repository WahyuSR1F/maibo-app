@extends('componen.main_admin')
@section('content2')
<section id="anggota">
    <div class="m-lg-3 m-1">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Daftar Organisasi</h4>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Nickname</th>
                          <th>Deskripsi</th>
                          <th>Nama Kampus</th>
                          <th>Dibuat</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($allData['organisasi'] as $item)
                        <tr>
                          <td>{{ $i }}</td>
                          <td>{{ $item->nama }}</td>
                          <td>{{ $item->nickname }}</td>
                          <td class="next-hidden">{{ $item->deskripsi }}</td>
                          <td>{{ $item->nama_kampus }}</td>
                          <td><label for="" class="badge badge-dark">{{ $item->created_at }}</label></td>
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