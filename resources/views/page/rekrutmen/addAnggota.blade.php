@extends('componen.main')

@section('content2')


<section id="perserta">
  <div class="row mt-lg-4 mt-3">
    <div class="col-lg-12 ">

        <div class="card">
            <div class="card-body">
              <h4 class="card-title">Perserta</h4>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIM</th>
                      <th>Nama</th>
                      <th>Devisi</th>
                      <th>Contact</th>
                      <th>Prodi</th>
                      <th>jurusan</th>
                      <th>Kampus</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ( $perserta as $item)
                    <tr>
                      <td>{{  $i }}</td>
                      <td>{{ $item->nim }}</td>
                      <td>{{ $item->nama}}</td>
                      <td>{{ $item->nama_devisi }}</td>
                      <td>{{ $item->contact }}</td>
                      <td>{{ $item->nama_prodi }}</td>
                      <td>{{  $item->nama_jurusan }}</td>
                      <td>{{ $item->nama_kampus }}</td>
                      <td>
                       <button type="button" onclick="showAlertAddAnggota('delete',{{ $item->id_peserta }})" class="btn btn-primary btn-sm">Add Anggota +</button></a>
                      </td>
                    </tr>

                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>

    </div>
</section>

    
@endsection