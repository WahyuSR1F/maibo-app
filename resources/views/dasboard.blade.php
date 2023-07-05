@extends('componen.main')



<!-- content 1 -->
@section('content1')
  <div class="content-wrapper">
    <div class="row">
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
                    <div>
                      <p class="statistics-title">All Event</p>
                      <h3 class="rate-percentage">20 <span>Event</span></h3>
                      <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p>
                    </div>
                    <div>
                      <p class="statistics-title">Open Event</p>
                      <h3 class="rate-percentage">10 Event</h3>
                      <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.1%</span></p>
                    </div>
                    <div>
                      <p class="statistics-title">Exipred Event</p>
                      <h3 class="rate-percentage">2 Event</h3>
                      <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
                    </div>
                    <div class="d-none d-md-block">
                      <p class="statistics-title">All Rekrutment</p>
                      <h3 class="rate-percentage">4 Event</h3>
                      <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                    </div>
                    <div class="d-none d-md-block">
                      <p class="statistics-title">Open Rekrutment</p>
                      <h3 class="rate-percentage">3 Event</h3>
                      <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
                    </div>
                    <div class="d-none d-md-block">
                      <p class="statistics-title">Participation</p>
                      <h3 class="rate-percentage">56%</h3>
                      <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                    </div>
                  </div>
                </div>
              </div> 

      @endsection

      @section('content2')
          
      
              <div class="row">
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
          
                  <div class="row ">
                    <div class="col-12 grid-margin stretch-card">
                      <div class="card card-rounded">
                        <div class="card-body">
                          <div class="d-sm-flex justify-content-between align-items-start">
                            <div>
                              <h4 class="card-title card-title-dash">All Event</h4>
                             <p class="card-subtitle card-subtitle-dash"> list Daftar Semua Event</p>
                            </div>
                            <div>
                              <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-account-plus"></i>Add new member</button>
                            </div>
                          </div>
                          <div class="table-responsive  mt-1">
                            <table class="table select-table">
                              <thead>
                                <tr>
                                  <th>
                                    No
                                  </th>
                                  <th>Event</th>
                                  <th>Event title</th>
                                  <th>Date</th>
                                  <th>Participation</th>
                                  <th>Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>
                                    1
                                  </td>
                                  <td>
                                    <div class="d-flex ">
                                      <img src="images/faces/face1.jpg" alt="">
                                      <div>
                                        <h6>Brandon Washington</h6>
                                        <p>Head admin</p>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <h6>Company name 1</h6>
                                    <p>company type</p>
                                  </td>
                                  <td>
                                    <div>
                                      <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                        <p class="text-success">79%</p>
                                        <p>85/162</p>
                                      </div>
                                      <div class="progress progress-md">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 85%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                    </div>
                                  </td>
                                  <td><div class="badge badge-opacity-warning">In progress</div></td>
                                </tr>
                                <tr>
                                  <td>
                                    2
                                  </td>
                                  <td>
                                    <div class="d-flex">
                                      <img src="images/faces/face2.jpg" alt="">
                                      <div>
                                        <h6>Laura Brooks</h6>
                                        <p>Head admin</p>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <h6>Company name 1</h6>
                                    <p>company type</p>
                                  </td>
                                  <td>
                                    <div>
                                      <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                        <p class="text-success">65%</p>
                                        <p>85/162</p>
                                      </div>
                                      <div class="progress progress-md">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                    </div>
                                  </td>
                                  <td><div class="badge badge-opacity-warning">In progress</div></td>
                                </tr>
                                <tr>
                                  <td>
                                    3
                                  </td>
                                  <td>
                                    <div class="d-flex">
                                      <img src="images/faces/face3.jpg" alt="">
                                      <div>
                                        <h6>Wayne Murphy</h6>
                                        <p>Head admin</p>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <h6>Company name 1</h6>
                                    <p>company type</p>
                                  </td>
                                  <td>
                                    <div>
                                      <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                        <p class="text-success">65%</p>
                                        <p>85/162</p>
                                      </div>
                                      <div class="progress progress-md">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 38%" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                    </div>
                                  </td>
                                  <td><div class="badge badge-opacity-warning">In progress</div></td>
                                </tr>
                                <tr>
                                  <td>
                                    <div class="form-check form-check-flat mt-0">
                                      <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="d-flex">
                                      <img src="images/faces/face4.jpg" alt="">
                                      <div>
                                        <h6>Matthew Bailey</h6>
                                        <p>Head admin</p>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <h6>Company name 1</h6>
                                    <p>company type</p>
                                  </td>
                                  <td>
                                    <div>
                                      <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                        <p class="text-success">65%</p>
                                        <p>85/162</p>
                                      </div>
                                      <div class="progress progress-md">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                    </div>
                                  </td>
                                  <td><div class="badge badge-opacity-danger">Pending</div></td>
                                </tr>
                                <tr>
                                  <td>
                                    <div class="form-check form-check-flat mt-0">
                                      <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="d-flex">
                                      <img src="images/faces/face5.jpg" alt="">
                                      <div>
                                        <h6>Katherine Butler</h6>
                                        <p>Head admin</p>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <h6>Company name 1</h6>
                                    <p>company type</p>
                                  </td>
                                  <td>
                                    <div>
                                      <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                        <p class="text-success">65%</p>
                                        <p>85/162</p>
                                      </div>
                                      <div class="progress progress-md">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                    </div>
                                  </td>
                                  <td><div class="badge badge-opacity-success">Completed</div></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
          @endsection


          @section('content4')
                  <div class="row flex-grow">
                    <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                      <div class="card card-rounded">
                        <div class="card-body card-rounded">
                          <h4 class="card-title  card-title-dash">Recent Events</h4>
                          <div class="list align-items-center border-bottom py-2">
                            <div class="wrapper w-100">
                              <p class="mb-2 font-weight-medium">
                                Change in Directors
                              </p>
                              <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                  <i class="mdi mdi-calendar text-muted me-1"></i>
                                  <p class="mb-0 text-small text-muted">Mar 14, 2019</p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="list align-items-center border-bottom py-2">
                            <div class="wrapper w-100">
                              <p class="mb-2 font-weight-medium">
                                Other Events
                              </p>
                              <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                  <i class="mdi mdi-calendar text-muted me-1"></i>
                                  <p class="mb-0 text-small text-muted">Mar 14, 2019</p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="list align-items-center border-bottom py-2">
                            <div class="wrapper w-100">
                              <p class="mb-2 font-weight-medium">
                                Quarterly Report
                              </p>
                              <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                  <i class="mdi mdi-calendar text-muted me-1"></i>
                                  <p class="mb-0 text-small text-muted">Mar 14, 2019</p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="list align-items-center border-bottom py-2">
                            <div class="wrapper w-100">
                              <p class="mb-2 font-weight-medium">
                                Change in Directors
                              </p>
                              <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                  <i class="mdi mdi-calendar text-muted me-1"></i>
                                  <p class="mb-0 text-small text-muted">Mar 14, 2019</p>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="list align-items-center pt-3">
                            <div class="wrapper w-100">
                              <p class="mb-0">
                                <a href="#" class="fw-bold text-primary">Show all <i class="mdi mdi-arrow-right ms-2"></i></a>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-6 grid-margin stretch-card">
                      <div class="card card-rounded">
                        <div class="card-body">
                          <div class="d-flex align-items-center justify-content-between mb-3">
                            <h4 class="card-title card-title-dash">Activities</h4>
                            <p class="mb-0">20 finished, 5 remaining</p>
                          </div>
                          <ul class="bullet-line-list">
                            <li>
                              <div class="d-flex justify-content-between">
                                <div><span class="text-light-green">Ben Tossell</span> assign you a task</div>
                                <p>Just now</p>
                              </div>
                            </li>
                            <li>
                              <div class="d-flex justify-content-between">
                                <div><span class="text-light-green">Oliver Noah</span> assign you a task</div>
                                <p>1h</p>
                              </div>
                            </li>
                            <li>
                              <div class="d-flex justify-content-between">
                                <div><span class="text-light-green">Jack William</span> assign you a task</div>
                                <p>1h</p>
                              </div>
                            </li>
                            <li>
                              <div class="d-flex justify-content-between">
                                <div><span class="text-light-green">Leo Lucas</span> assign you a task</div>
                                <p>1h</p>
                              </div>
                            </li>
                            <li>
                              <div class="d-flex justify-content-between">
                                <div><span class="text-light-green">Thomas Henry</span> assign you a task</div>
                                <p>1h</p>
                              </div>
                            </li>
                            <li>
                              <div class="d-flex justify-content-between">
                                <div><span class="text-light-green">Ben Tossell</span> assign you a task</div>
                                <p>1h</p>
                              </div>
                            </li>
                            <li>
                              <div class="d-flex justify-content-between">
                                <div><span class="text-light-green">Ben Tossell</span> assign you a task</div>
                                <p>1h</p>
                              </div>
                            </li>
                          </ul>
                          <div class="list align-items-center pt-3">
                            <div class="wrapper w-100">
                              <p class="mb-0">
                                <a href="#" class="fw-bold text-primary">Show all <i class="mdi mdi-arrow-right ms-2"></i></a>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

        @endsection
        @section('conten6')
            
                  <div class="row flex-grow">
                    <div class="col-12 grid-margin stretch-card">
                      <div class="card card-rounded">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                  <h4 class="card-title card-title-dash">Top Performer</h4>
                                </div>
                              </div>
                              <div class="mt-3">
                                <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                  <div class="d-flex">
                                    <img class="img-sm rounded-10" src="images/faces/face1.jpg" alt="profile">
                                    <div class="wrapper ms-3">
                                      <p class="ms-1 mb-1 fw-bold">Brandon Washington</p>
                                      <small class="text-muted mb-0">162543</small>
                                    </div>
                                  </div>
                                  <div class="text-muted text-small">
                                    1h ago
                                  </div>
                                </div>
                                <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                  <div class="d-flex">
                                    <img class="img-sm rounded-10" src="images/faces/face2.jpg" alt="profile">
                                    <div class="wrapper ms-3">
                                      <p class="ms-1 mb-1 fw-bold">Wayne Murphy</p>
                                      <small class="text-muted mb-0">162543</small>
                                    </div>
                                  </div>
                                  <div class="text-muted text-small">
                                    1h ago
                                  </div>
                                </div>
                                <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                  <div class="d-flex">
                                    <img class="img-sm rounded-10" src="images/faces/face3.jpg" alt="profile">
                                    <div class="wrapper ms-3">
                                      <p class="ms-1 mb-1 fw-bold">Katherine Butler</p>
                                      <small class="text-muted mb-0">162543</small>
                                    </div>
                                  </div>
                                  <div class="text-muted text-small">
                                    1h ago
                                  </div>
                                </div>
                                <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                  <div class="d-flex">
                                    <img class="img-sm rounded-10" src="images/faces/face4.jpg" alt="profile">
                                    <div class="wrapper ms-3">
                                      <p class="ms-1 mb-1 fw-bold">Matthew Bailey</p>
                                      <small class="text-muted mb-0">162543</small>
                                    </div>
                                  </div>
                                  <div class="text-muted text-small">
                                    1h ago
                                  </div>
                                </div>
                                <div class="wrapper d-flex align-items-center justify-content-between pt-2">
                                  <div class="d-flex">
                                    <img class="img-sm rounded-10" src="images/faces/face5.jpg" alt="profile">
                                    <div class="wrapper ms-3">
                                      <p class="ms-1 mb-1 fw-bold">Rafell John</p>
                                      <small class="text-muted mb-0">Alaska, USA</small>
                                    </div>
                                  </div>
                                  <div class="text-muted text-small">
                                    1h ago
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection