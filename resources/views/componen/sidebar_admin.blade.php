<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav py-3 px-2 shadow-lg">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('dasboard_admin') }}">
          <i class="mdi menu-icon"><ion-icon name="home-outline"></ion-icon></i>
          <span class="menu-title ">Dashboard</span>
        </a>
      </li>
      <li class="nav-item nav-category">Organisasi</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon mdi mdi-account-card-details"></i>
          <span class="menu-title">Internal</span>
          <i class="menu-arrow"></i> 
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('all_organisasi') }}">All Orgnaisasi</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('created_organisasi') }}">Create Organisasi</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item nav-category">User</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth1" aria-expanded="false" aria-controls="auth">
          <i class="menu-icon mdi mdi-airballoon"></i>
          <span class="menu-title">Kelolah User</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth1">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('user_view') }}"> All User</a></li>
          </ul>
        </div>
      </li>
        
      <li class="nav-item nav-category">Administrator</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="menu-icon mdi  mdi-animation"></i>
          <span class="menu-title">Kelolah Administrasi</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('jurusan_view') }}">all jurusan</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('prodi_view') }}">all Prodi</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('kampus_view') }}">all Politeknik</a></li>
          </ul>
        </div>
    </li>
     
    </ul>
  </nav>