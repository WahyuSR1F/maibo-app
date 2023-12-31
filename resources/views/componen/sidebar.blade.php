<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav py-3 px-2 shadow-lg">
    <li class="nav-item">
      <a class="nav-link" onclick="loading()" href="{{ route('organisasi_dashboard') }}">
        <i class="mdi menu-icon"> <ion-icon name="home-outline"></ion-icon></i>
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
          <li class="nav-item"> <a class="nav-link" onclick="loading()" href="{{ route('organisasi_anggota_view') }}">Anggota</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item nav-category">Post</li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#auth1" aria-expanded="false" aria-controls="auth">
        <i class="menu-icon mdi mdi-airballoon"></i>
        <span class="menu-title">Kelolah Post</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth1">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link"  onclick="loading()" href="{{ route('organisasi_post_view') }}"> All Post </a></li>
          <li class="nav-item"> <a class="nav-link"  onclick="loading()"  href="{{ route('organisasi_post_create') }}"> Create Post </a></li>
        </ul>
      </div>
    </li>
      
    <li class="nav-item nav-category">Event</li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="menu-icon mdi  mdi-animation"></i>
        <span class="menu-title">Kelolah Event</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link"  onclick="loading()" href="{{ route('organisasi_event_view') }}"> All Event </a></li>
          <li class="nav-item"> <a class="nav-link"  onclick="loading()" href="{{ route('create_event_view') }}"> Create Event </a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item nav-category">Rekrutment</li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
        <i class="menu-icon mdi mdi-card-text-outline"></i>
        <span class="menu-title"> Kelolah Rekrutment</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="form-elements">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link"  onclick="loading()" href="{{ route('organisasi_rekrutmen_view') }}">All Rekrutment</a></li>
        </ul> <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" onclick="loading()" href="{{ route('organisasi_rekrutmen_create') }}">Create Rekrutment</a></li>
        </ul> <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" onclick="loading()" href="{{ route('organisasi_rekrutmen_add_view') }}">Participasi</a></li>
        </ul>
      </div>
    </li>
   
  </ul>
</nav>