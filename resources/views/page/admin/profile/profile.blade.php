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
                                <div class="m-lg-2">
                                    <img class="rounded-circle img-thumbnail" src="https://i.pinimg.com/originals/ef/81/1d/ef811de0cdb91c3e1fdbc6342859e609.jpg" class="card-img-top" alt="...">
                                </div>
                              <h5 class="card-title">Admin</h5>
                              <p class="card-text">Badan kelolah pengguna Aplikasi</p>                          
                            </div>
                          </div>
                    </div>

                    <div class="col-lg-8 m-lg-2 mt-3">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <table>
                                        <tr>
                                            <td>Nama :</td>
                                            <td>Wahyu Sahri Rhamadhan</td>
                                        </tr>
                                        <tr>
                                            <td>Account :</td>
                                            <td>wahyu@gmail.com</td>
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