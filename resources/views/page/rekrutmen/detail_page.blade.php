@extends('componen.main')

@section('content1')
    
<section id="detail">
    <div class="m-lg-2 mt-lg-0 mt-3">
        <div class="container-fluid">
            <div class="bg-light p-lg-2 rounded-2">
                <div class="row ">

                    <div class="col-lg-12 m-lg-2">
                        <div class="row">
                            <div class="col-lg-4 mt-lg-3">
                                
                                @if ($gambar->foto)
                                <div class="card rounded-9">
                                    <img class="img-thumbnail rounded" src="{{ asset('storage/dataApp/rekrutmen/img/'.$gambar->foto) }}" alt="">
                                </div>
                                @else
                                <div class="card rounded-9">
                                  gambar tidak ada
                               </div>  
                                @endif
                               

                                <div class="mt-4 d-flex justify-content-start">
                                    <a href=""> <button class="btn btn-primary btn-sm m-1">Edit <span><ion-icon name="pencil-outline"></ion-icon></span></button></a>
                                    <a href=""> <button class=" m-1 btn btn-warning btn-sm ">Cancel <ion-icon name="ban-outline"></ion-icon></button></a>
                                </div>
                            </div>
                            <div class="col-lg-8 mt-lg-3 mt-3">
                                <div class="row">
                                    <div class="card">
                             
                                        <div class="card-body">
                                          <h3 class="card-title title">Judul Rekrutment :</h3>
                                          <h4 class="card-title title">{{ $rekrutmen->title }}</h4>
                                          <h6> Registrasi Awal Open : <label class="badge badge-success mt-1">{{ $rekrutmen->registration_start }}</label></h6>
                                          <h6> Registrasi Ditutup :<label class="badge badge-danger mt-1">{{ $rekrutmen->registration_close }}</label></h6>
                                          <h6> Event Dimulai : {{ $rekrutmen->event_start }}</h6>
                                          <div id="participasi-record" class="mt-4">
                                           <h6 class="m-1">Rekrutment Perserta</h6>
                                          <div class="d-flex justify-content-start">
                                            <h6 class="m-1">{{ $count }}</h6>
                                            <a  href=""><label class=" mdi mdi-account-multiple"></label></a>
                                            <h6 class="m-1">Perserta</h6>
                                          </div> 
                                          </div>
                                        </div>  
                                    </div>

                                    <div class="card mt-lg-4 mt-lg-3 mt-3">
                                        <div class="card-body">
                                             <h3 class="card-title title">Deskripsi</h3>

                                             <textarea id="myTextarea" oninput="adjustTextareaSize(this)" class=" border-0 bg-white" rows="20" cols="50" disabled >{{ $rekrutmen->deskripsi }}</textarea>
                                        </div>
                                    </div>
                              </div> 
                            </div>    
                            </div>

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
                                              @foreach ( $participasi as $item)
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
                                                  <button class="btn btn-primary btn-sm">Add Anggota +</button>
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
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</section>


<script>
function adjustTextareaSize(textarea) {
  var rows = textarea.value.split("\n").length;
  console.log(rows)
  var cols = textarea.value.split("\n").reduce(function (prev, current) {
    return Math.max(prev, current.length);
  }, 0);
  
  textarea.rows = rows;
  textarea.cols = cols;
}
</script>
@endsection