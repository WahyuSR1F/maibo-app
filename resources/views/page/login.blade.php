

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Maibo</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('assets') }}vendors/feather/feather.css">
  <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/typicons/typicons.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/simple-line-icons/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/js/select.dataTables.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('assets/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png')}}" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway:wght@500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<body >

  <div class=" container bg-white">
    <div class="ull-page-wrapper">
      <div class=" d-flex align-items-center auth px-0 shadow-lg m-5 " data-aos="fade-down">
        <div class="row w-1000 " >
          <div class="col-lg-6  pb-3  p-lg-5 h-100 " data-aos="fade-right">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="{{ asset('assets/img/PNG/vector-login1.png') }}" class=" mx-auto d-block img-fluid " alt="...">
               
                    <div class=" text-center d-md-block mt-5 pb-4 pt-3 "  >
                     <h4 class="text-primary">Colaborative</h4> 
                    </div>
                 
                </div>
                <div class="carousel-item ">
                  <img src="{{ asset('assets/img/PNG/vector-login2.png') }}" class=" mx-auto  d-block img-fluid" alt="...">
                  
                    <div class=" text-center d-md-block mt-5 ">
                      <h5 class="text-primary">Organization Post</h5>
                    </div>
                </div>
                <div class="carousel-item">
                  <img src="{{ asset('assets/img/PNG/vector-login3.png') }}" class=" mx-auto d-block img-fluid" alt="...">
                    <div class=" text-center d-md-block mt-5">
                      <h5 class="text-primary">Information Organization</h5>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 " data-aos="fade-left">
            <div class="py-5 px-5 rounded  "  style="background-color: rgb(34, 97, 214)">
              <div class="m-lg-4 m-auto">
              
              <div class="text-center pb-2">
                <div class="brand-logo w-300">
                  <img class="" src="{{ asset('assets/img/whitelogo.png')}}" alt="logo">
                </div>
                 <h4 class="text-white blod"><span style="font-family:">MAIBO </span> Admin Center</h4>
                 <h6 class="fw-light text-white">Sign in untuk Mengolah event dan Organisasi Anda</h6>
              </div>
             
              <form class="pt-3" action="{{ route('login') }}" method="POST">
                @csrf
              @if (session('error'))
                  <div class="alert alert-danger rounded-pill">
                      {{ session('error') }}
                  </div>
              @endif
                <div class="form-group">
                  <label class="form-check-label text-white bold"  style="text-align: left;" >Email</label>
                  <input type="email" class="form-control form-control-lg rounded-pill" name="username" id="exampleInputEmail1" placeholder="email" style="background-color: white" required>
                </div>
                <div class="form-group">
                  <label class="form-check-label text-white bold"  style="text-align: left;" >Password</label>
                  <input type="password" class="form-control form-control-lg rounded-pill" name="password" id="exampleInputPassword1" placeholder="Password" style="background-color:white; #exampleInputPassword1::palceholder {color:white}" required>
                </div>
                <div class="mt-3 d-flex justify-content-center">
                  <button onclick="loading()" class="btn btn-primary btn-md rounded-pill w-100" type="submit">Sign In</button>
                </div>
                <div class="my-2">
                  <div class="form-check d-flex justify-content-between mt-3">
                    <a href="#" class="auth-link text-white link-offset-2 link-underline link-underline-opacity-0">Forgot password?</a>
                  </div>
                  
                   
                  
                </div>
              </form>
              <div class="d-flex justify-content-center mt-5">
                <p class="text-white-50  text-center ">By<span>@</span>Maibo Teams</p>
              </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('assets/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{ asset('assets/vendors/progressbar.js/progressbar.min.js')}}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('assets/js/off-canvas.js')}}"></script>
  <script src="{{ asset('assets/js/hoverable-collapse.js')}}"></script>
  <script src="{{ asset('assets/js/template.js')}}"></script>
  <script src="{{ asset('assets/js/settings.js')}}"></script>
  <script src="{{ asset('assets/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('assets/js/jquery.cookie.js')}}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/dashboard.js')}}"></script>
  <script src="{{ asset('assets/js/Chart.roundedBarCharts.js')}}"></script>
  <!-- End custom js for this page-->

 <!-- animation aos -->
 <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
 <script>
   AOS.init();
 </script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>


 
