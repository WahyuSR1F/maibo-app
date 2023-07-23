
@foreach ($profile as $item)
    
@endforeach
@include('componen.head')
@include('componen.header_admin')

<section id="profile bg-light">
    <div class="m-lg-2" style="padding-top: 100px">
        <div class="container-fluid">
            <div class="bg-light p-lg-2 rounded-2">
                <div class="row ">
                    <div class="col-lg-3 m-lg-2">
                        <div class="card text-center w-auto">
                            <div class="card-body">
                                <div class="m-lg-2" style="width: 200px; height: 200px; background-image: url('{{ $item->foto_profile }}'); background-size: cover;  background-position: center;  border-radius: 50%;">
                                </div>
                              <h5 class="card-title">Admin</h5>
                              <p class="card-text">{{ $item->username }}</p>                          
                            </div>
                          </div>
                    </div>

                    <div class="col-lg-8 m-lg-2 mt-3">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <table>
                                        <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                            <td>Admin</td>
                                        </tr>
                                        <tr>
                                            <td>Account </td>
                                            <td>:</td>
                                            <td>{{ $item->username }}</td>
                                        </tr>
                                        <tr>
                                            <td>Bergabung pada </td>
                                            <td>:</td>
                                            <td>{{ $item->created_at }}</td>
                                        </tr>
                                    </table>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</section>

@include('componen.footer')
@include('componen.script')