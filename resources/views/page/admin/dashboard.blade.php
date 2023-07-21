
@extends('componen.main_admin')


<!-- content 1 -->
@section('content1')

    <div class="row m-3 pt-lg-1 pt-4">
      <div class="col-sm-12">
        <div class="home-tab">
          <div class="d-sm-flex align-items-center justify-content-between border-bottom">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <h6>Information Organisasi</h6>
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
                      <p class="statistics-title">All Organisasi</p>
                      <h3 class="rate-percentage">{{ $allData['organisasi'] }} <span class="mdi mdi-airballoon"></span></h3>
                    </div>
                    <div  data-aos="fade-down">
                        <p class="statistics-title">Jurusan</p>
                        <h3 class="rate-percentage">{{ $allData['jurusan'] }}<span class="mdi mdi-animation"></span></h3>
                        
                    </div>
                    <div  data-aos="fade-down">
                        <p class="statistics-title">Prodi</p>
                        <h3 class="rate-percentage">{{ $allData['prodi'] }}<span class="mdi mdi-animation"></span></h3>
                        
                    </div>
                    <div  data-aos="fade-down">
                        <p class="statistics-title">Kampus</p>
                        <h3 class="rate-percentage">{{ $allData['kampus'] }}<span class="mdi mdi-animation"></span></h3>
                       
                    </div>
                    <div  data-aos="fade-down">
                      <p class="statistics-title">All  User Total</p>
                      <h3 class="rate-percentage">{{ $allData['user'] }}<span class="mdi mdi-animation"></span></h3>
                    
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
                              <h4 class="card-title card-title-dash">Rekap Organisasi Aktif</h4>
                             <p class="card-subtitle card-subtitle-dash"></p>
                            </div>
                          </div>
                          <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                            <div class="d-sm-flex align-items-center mt-4 justify-content-between"><h2 class="me-2 fw-bold">Keatifan Organisasi : </h2><h4 class="me-2">Robotik</h4></div>
                            <div class="me-3"><div id="marketing-overview-legend"></div></div>
                          </div>
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
                  <h4 class="card-title">Rekap Member</h4>
                  <canvas id="pieChart"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card" data-aos="fade-down">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">User Participasi</h4>
                  <canvas id="barChart"></canvas>
                  <div class="mt-4">
                    <h6>Conclusion : </h6>
                    <h6><span class="text-bold text-success">your hight member in 2023</span></h6>
                    <h6><span class="text-bold text-danger">your low member in 2022</span></h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endsection


