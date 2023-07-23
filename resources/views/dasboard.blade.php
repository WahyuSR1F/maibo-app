
@extends('componen.main')

<!-- content 1 -->
@section('content1')

    <div class="row m-3 pt-lg-1 pt-4">
      <div class="col-sm-12">
        <div class="home-tab">
          <div class="d-sm-flex align-items-center justify-content-between border-bottom">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <h6>Information Event Record</h6>
              </li>
              
        
            </ul>
            <div>
              <div class="btn-wrapper">
                <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
              </div>
            </div>
          </div>
          <div class="tab-content tab-content-basic">
            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
              <div class="row">
                <div class="col-sm-12">
                  <div class="statistics-details d-flex align-items-center justify-content-between">
                    <div  data-aos="fade-down">
                      <p class="statistics-title">All Event</p>
                      <h3 class="rate-percentage">{{ $countEvent }} <span class="mdi mdi-airballoon"></span></h3>
                      <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p>
                    </div>
                    <div  data-aos="fade-down">
                      <p class="statistics-title">All Post</p>
                      <h3 class="rate-percentage">{{  $countPost }} <span class="mdi mdi-animation"></span></h3>
                      <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.1%</span></p>
                    </div>
                    <div  data-aos="fade-down">
                      <p class="statistics-title">All Rekrutment</p>
                      <h3 class="rate-percentage">{{ $countRekrutmen }} <span class="mdi mdi-apple-keyboard-shift"></span></h3>
                      <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
                    </div>
                    <div class="d-none d-md-block"  data-aos="fade-down">
                      <p class="statistics-title">Anggota</p>
                      <h3 class="rate-percentage">{{  $countAnggota }} Member</h3>
                      <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                    </div>
                    <div class="d-none d-md-block"  data-aos="fade-down">
                      <p class="statistics-title">Participation Event</p>
                      <h3 class="rate-percentage">{{  $countParticipantEvent }} <span class="mdi mdi-account-multiple-outline"></span></h3>
                      <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
                    </div>
                    <div class="d-none d-md-block"  data-aos="fade-down">
                      <p class="statistics-title">Candidated Rekrutment</p>
                      <h3 class="rate-percentage">{{  $countParticipantRekrutmen }} Persons</h3>
                      <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                    </div>
                  </div>
                </div>
             

      @endsection

      @section('content2')
          
      
              <div class="row" data-aos="fade-up">
                <div class="col-lg-12 d-flex flex-column">
                  <div class="row flex-grow">
                    <div class="col-12 grid-margin stretch-card">
                      <div class="card card-rounded">
                        <div class="card-body">
                          <div class="d-sm-flex justify-content-between align-items-start">
                            <div>
                              <h4 class="card-title card-title-dash">Record Event Organisasi</h4>
                             <p class="card-subtitle card-subtitle-dash">Data partisipasi event</p>
                            </div>
                          </div>
                          <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                            <div class="d-sm-flex align-items-center mt-4 justify-content-between"><h2 class="me-2 fw-bold">Partisipasi Tertinggi</h2><h4 class="me-2">: Bulan Mei</h4></div>
                            <div class="me-3"><div id="marketing-overview-legend"></div></div>
                          </div>
                          <p class="card-subtitle">Event : Webinar UI/UX</p>
                          <div class="chartjs-bar-wrapper mt-3">
                            <canvas id="marketingOverview"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
      @endsection
      @section('content3')
        <div class=" mb-sm-3 mb-lg-5 d-lg-flex justiy-content-between">
          <div class="row">
             <div class="col-lg-6 grid-margin grid-margin-lg-0 stretch-card" data-aos="fade-up">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Activity</h4>
                  <canvas id="pieChart"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card" data-aos="fade-down">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Rekrutment Participation For year</h4>
                  <canvas id="barChart"></canvas>
                  <div class="mt-4">
                    <h6>Conclusion : </h6>
                    <h6><span class="text-bold text-success">your hight Participation Rekrutment in 2023</span></h6>
                    <h6><span class="text-bold text-danger">your low Participation Rekrutment in 2020</span></h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endsection
      @section('content4')
      <div class="row">
        <div class="col-lg-12">
          <div class="home-tab">
           <div class="d-sm-flex align-items-center justify-content-between border-bottom">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item ">
              <button class="btn btn-primary" onclick="viewPage('page.ajax_containt.event')">Event</button>
            </li>
            <li class="nav-item">
              <button class="btn btn-primary" onclick="viewPage('page.ajax_containt.post')">Post</button>
            </li>
            <li class="nav-item">
              <button class="btn btn-primary" onclick="viewPage('page.ajax_containt.rekrutmen')">Rekrutment</button>
            </li>
          </ul>
          <div>
          </div>
        </div>
        </div>
      </div>
      
      @endsection


     
      @section('content5')
                 <div id="konten">

                 </div>
      @endsection


      
      <script>
         function viewPage(urlPage) {
          $.ajax({
            url: urlPage,
            type: "GET",
            success: function(data) {
              $("#konten").html(data); // Mengganti konten dengan respons dari server
            },
            error: function(xhr, status, error) {
              console.log(error); // Menampilkan pesan kesalahan jika permintaan gagal
            }
          });
        }
        
      </script>
