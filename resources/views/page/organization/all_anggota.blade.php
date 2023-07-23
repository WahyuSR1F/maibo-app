

@extends('componen.main')

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
            title: 'gagal',
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
                  <h4 class="card-title">Daftar Anggota Organisasi</h4>
                  <div class="table-responsive">
                    <table class="table table-hover" id="reload-ajax">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>NIM</th>
                          <th>Nama</th>
                          <th>Status Pangkat</th>
                          <th>Devisi</th>
                          <th>Bergabung</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($anggota as $item)
                            
                     
                        <tr>
                          <td>{{ $i }}</td>
                          <td>{{ $item->nim }}</td>
                          <td>{{ $item->nama_mahasiswa }}</td>
                          <td><label for="" class="badge badge-warning">{{ $item->status_pangkat }}</label></td>
                          <td>{{ $item->nama_devisi }}</td>
                          <td>{{ $item->created_at }}</td>
                          <td>
                            <div class="d-flex m-1 justify-content-between">
                                <a href=""><label class="badge badge-success m-1">view</label></a>
                                <a href=""><label class="badge badge-warning m-1">Edit</label></a>
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
</section>
    
@endsection