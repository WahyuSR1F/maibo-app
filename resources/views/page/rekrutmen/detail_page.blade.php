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
                                    <img class="img-thumbnail rounded" src="{{ asset('assets/img/PNG/12.png') }}" alt="">
                                </div>

                                <div class="mt-4 d-flex justify-content-start">
                                    <a href=""> <button class="btn btn-primary btn-sm m-1">Edit <span><ion-icon name="pencil-outline"></ion-icon></span></button></a>
                                    <a href="{{ route('viewPage', ['page' => 'page.event.allview_page']) }}"> <button class=" m-1 btn btn-warning btn-sm ">Cancel <ion-icon name="ban-outline"></ion-icon></button></a>
                                </div>
                            </div>
                            <div class="col-lg-8 mt-lg-3 mt-3">
                                <div class="row">
                                    <div class="card">
                             
                                        <div class="card-body">
                                          <h3 class="card-title title">Judul Rekrutment :</h3>
                                          <h4 class="card-title title">Commodo Lorem sint adipisicing velit.</h4>
                                          <p> <label class="badge badge-info" for="">Rekrutment</label><label class=" badge badge-success m-1" for="">public</label></p>
                                          <h6> <label class="badge badge-success mt-1">Opening On 12/7/2022  20:23:12 PM</label></h6>
                                          <h6> <label class="badge badge-danger mt-1">Close On 13/7/2022  20:23:12 PM</label></h6>
                                          <div id="participasi-record" class="mt-4">
                                           <h6 class="m-1">Rekrutment Perserta</h6>
                                          <div class="d-flex justify-content-start">
                                            <h6 class="m-1">80</h6>
                                            <a  href=""><label class=" mdi mdi-account-multiple"></label></a>
                                            <h6 class="m-1">Perserta</h6>
                                          </div> 
                                          </div>
                                        </div>  
                                    </div>

                                    <div class="card mt-lg-4 mt-lg-3 mt-3">
                                        <div class="card-body">
                                             <h3 class="card-title title">Deskripsi</h3>

                                             <textarea id="myTextarea" oninput="adjustTextareaSize(this)" class=" border-0 bg-white" rows="50" cols="50" disabled >
Assalamualaikum Wr. Wb. Salam sejahtera untuk kita semua. Om swastiastu, Shaloom, Nammo, Budhaya. 

Diberitahukan kepada seluruh *  Ketua himpunan atau perwakilan himpunan bahwasanya akan diadakan Rapat terkait BaktiSosial serta Kantong Mahasiswa Poliwangi (Baksosmangmas)* pada :

📅 : Jumat, 14 Juli 2023
⏰ : 13.00 WIB - Selesai
📍 : Sekretariat BEM 
👔 : Bebas, Sopan, Rapi

NB: 
- WAJIB
- DIUSAHAKAN DATANG 15 MENIT SEBELUM ACARA DIMULAI 


Sekian Terima kasih
Wassalamualaikum Wr. Wb.

Ikuti dan dapatkan informasi lengkap tentang kami!!
Instagram : @bempoliwangi
Youtube : BemPoliwangi
Email : bem@poliwangi.ac.id
====================
Badan Eksekutif Mahasiswa
Kabinet Bana Adhibrata
Politeknik Negeri Banyuwangi
2023
•

Hidup Mahasiswa 
Hidup Politeknik 
Hidup Rakyat Indonesia
                                             </textarea>
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
                                                <th>Nama</th>
                                                <th>Organisasi</th>
                                                <th>Prodi</th>
                                                <th>jurusan</th>
                                                <th>Kampus</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <td>1</td>
                                                <td>Wahyu Sahri Rhamadhan</td>
                                                <td><label for="" class="badge badge-success">Robotika</label></td>
                                                <td>Teknologi Rekayasa Perangkat Lunak</td>
                                                <td>Informasi dan Bisnis</td>
                                                <td>Politeknik Negeri Banyuwangi</td>
                                                <td><a href="{{ route('viewPage',['page'=>'page.user.profile_user']) }}"><label for=""class="badge badge-info">view</label></a></td>
                                              </tr>
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