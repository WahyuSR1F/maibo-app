@include('componen.head')
@include('componen.header')

<section id="profile">
    <div class="m-lg-2" style="padding-top: 100px">
        <div class="container-fluid">
            <div class="bg-light p-lg-2 rounded-2">
                <div class="row ">
                    <div class="col-lg-3 m-lg-2">
                        <div class="card text-center w-auto">
                            <div class="card-body">
                                <div class="m-lg-2">
                                    <img class="rounded-circle img-thumbnail" src="{{ $session[0]->foto_profile }}" class="card-img-top" alt="..." style="width: 200px; height: 200px; background-image: url('{{ $session[0]->foto_profile }}'); background-size: cover;  background-position: center;  border-radius: 50%;">
                                </div>
                              <h5 class="card-title">{{  $organisasi->nickname  }}</h5> 
                              <p>{{ $session[0]->username }}</p>                            
                            </div>
                          </div> 
                    </div>
                    
                    <div class="col-lg-8 m-lg-2 mt-3">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                  <div class="d-flex justify-content-between mb-3">
                                    <h4 class="card-title title">{{ $organisasi->nama }}</h4>
                                    <button type="button" class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Edit <span><ion-icon name="create-outline"></ion-icon></span></button>
                                  </div>
                                  <div class="form-floating">
                                    <textarea class="bg-white border-0"  id="floatingTextarea" disabled style="width: 100%; height:700px">{{ $organisasi->deskripsi }}</textarea>
                                  </div>
                                </div>
                              </div>
                        </div>

                        <div class="row pt-lg-3 mt-lg-0 mt-3">
                            <div class="card border-white">
                                <div class="card-body">
                                  <h4 class="card-title">Pengurus Organisasi</h4>
                                    <div class="row justify-content-center">
                                        <div class="col-lg-4">
                                            <div class="card text-center w-auto">
                                                <div class="card-body">
                                                    <p class="text-bold">Ketua Umum</p>
                                                    <div class="m-lg-2">
                                                        <img class="rounded-circle img-thumbnail" src="https://i.pinimg.com/originals/ef/81/1d/ef811de0cdb91c3e1fdbc6342859e609.jpg" class="card-img-top" alt="...">
                                                    </div>
                                                  <h5 class="card-title">Wahyu Sahri Rhamadhan</h5>
                                                                            
                                                </div>
                                              </div>
                                        </div>

                                        <div class="col-lg-4 mt-lg-0 mt-2">
                                            <div class="card text-center w-auto ">
                                                <div class="card-body">
                                                    <p class="text-bold">Wakil Ketua Umum</p>
                                                    <div class="m-lg-2">
                                                        <img class="rounded-circle img-thumbnail" src="https://i.pinimg.com/originals/ef/81/1d/ef811de0cdb91c3e1fdbc6342859e609.jpg" class="card-img-top" alt="...">
                                                    </div>
                                                  <h5 class="card-title">Muhammad Hanif</h5>
                                                                                
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
</section>






<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary shadow-lg">
        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Edit Profile</h1>
        <button type="button" class="btn-close  text-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body bg-light">
        <form>
          <div class="mb-3">
            <label for="recipient-name " class="col-form-label">Edit Nickname:</label>
            <input type="text" class="form-control shadow-lg" id="recipient-name" placeholder="nickname">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Deskripsi:</label>
            <textarea class="form-control shadow-lg" id="message-text" style="width: 100%; height:200px;" name="deskripsi"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm shadow-lg" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn-sm">Simpan Perubahan</button>
      </div>
    </div>
  </div>
</div>

@include('componen.footer')
@include('componen.script')




