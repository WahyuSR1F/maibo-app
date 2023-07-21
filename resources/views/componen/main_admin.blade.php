@include('componen.head')
@include('componen.header_admin')
<!-- partial -->

<div class="container-fluid page-body-wrapper">
@include('componen.sidebar_admin')
<div class="main-panel">
@yield('content1')
@yield('content2')
@yield('content3')
@yield('content4')
@yield('content5')
</div>
</div>

@include('componen.footer')

@include('componen.script')