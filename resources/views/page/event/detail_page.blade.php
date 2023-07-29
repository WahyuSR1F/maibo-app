
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
                                
                                <div class="card rounded-9">
                                  @if($gambar->foto)
                                 @php
                                    
                                 @endphp
                                  <img class="img-thumbnail rounded" src="{{ asset('storage/dataAPP/event/img/'.$gambar->foto)  }}" alt="">
                                  @else
                                  <p class="p-3">tidak gambar yang tersedia</p> 
                                  @endif
                                    
                                </div>

                                <div class="mt-4 d-flex justify-content-start">
                                    <a href="{{ route('edit_event_view',['id' => $item->id]) }}"> <button class="btn btn-primary btn-sm m-1">Edit <span><ion-icon name="pencil-outline"></ion-icon></span></button></a>
                                    <a href="{{ route('organisasi_event_view')}}"> <button class=" m-1 btn btn-warning btn-sm ">Cancel <ion-icon name="ban-outline"></ion-icon></button></a>
                                </div>
                            </div>
                            <div class="col-lg-8 mt-lg-3 mt-3">
                                <div class="row">
                                    <div class="card">
                                        <div class="card-body">
                                          <h3 class="card-title title">Judul Event :</h3>
                                          <h4 class="card-title title">{{ $item->title }}</h4>
                                          <h6> Jenis :<label class="badge badge-info" for=""> {{ $jenis_event->nama }}</label></h6>
                                          <h6> Start Registration : <label class="badge badge-success mt-1"> {{ $item->registration_start  }}</label></h6>
                                          <h6> Close Registration : <label class="badge badge-danger mt-1">{{ $item->registration_close  }}</label></h6>
                                          <h6> Event Start :<label class="badge badge-success mt-1">{{ $item->event_start  }}</label></h6>
                                          <h6> Event Close :<label class="badge badge-danger mt-1">{{ $item->event_close }}</label></h6>
                                          <div id="participasi-record" class="mt-4">
                                           <h6 class="m-1">Participation Event</h6>
                                          <div class="d-flex justify-content-start">
                                            <h6 class="m-1">{{ $count }}</h6>
                                            <a  href=""><label class=" mdi mdi-account-multiple"></label></a>
                                            <h6 class="m-1">Participasi</h6>
                                          </div> 
                                          </div>
                                        </div>  
                                    </div>

                                    <div class="card mt-lg-4 mt-lg-3 mt-3">
                                        <div class="card-body">
                                             <h3 class="card-title title">Deskripsi</h3>

                                             <textarea id="myTextarea" oninput="autoResize(this)" class=" border-0 bg-white" disabled rows="40" style="resize: none; overflow-y:hidden; width:100%; min-height:50px">{{ $item->deskripsi }}</textarea>
                                            
                                        </div>
                                    </div>
                              </div> 
                            </div>    
                            </div>

                            <div class="row mt-lg-4 mt-3">
                              <div class="col-lg-12 ">

                                  <div class="card">
                                      <div class="card-body">
                                        <h4 class="card-title">Participation</h4>
                                        <div class="table-responsive">
                                          <table class="table table-hover">
                                            <thead>
                                              <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Organisasi</th>
                                                <th>Prodi</th>
                                                <th>jurusan</th>
                                                <th>Kampus</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              @php
                                                  $i =1;
                                              @endphp
                                              @foreach ($participant as $value)
                                                  
                                              <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $value->nama }}</td>
                                                <td><label for="" class="badge badge-success">Robotika</label></td>
                                                <td>Teknologi Rekayasa Perangkat Lunak</td>
                                                <td>Informasi dan Bisnis</td>
                                                <td>Politeknik Negeri Banyuwangi</td>
                                                <td><a href="{{ route('praticipasi_detail_event',['id' => $value->id]) }}"><label for=""class="badge badge-info p-4">view</label></a></td>
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