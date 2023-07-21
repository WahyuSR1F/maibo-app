
@extends('componen.main_admin')


@section('content1')
    <div class="m-lg-3">
        <div class="row">
            <div class="col-lg-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Menambahkan Organisasi</h4>
                    <form class="forms-sample" action="{{ route('created_prosess') }}" method="POST">
                      @csrf
                      <div class="form-group ">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email Organisasi</label>
                          <div class="col-sm-9">
                            <div class="">

                               <input class="form-control form-control-sm" type="text" required  name='email'>
                            </div>
                            
                          </div>
                      </div>
                      <div class="form-group ">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nama Organisasi</label>
                          <div class="col-sm-9">
                            <div class="">

                               <input class="form-control form-control-sm" type="text" required  name='nama'>
                            </div>
                            
                          </div>
                      </div>
                      <div class="form-group ">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nickname</label>
                          <div class="col-sm-9">
                            <div class="">

                               <input class="form-control form-control-sm" name="nickname" type="text" required placeholder="penulisan nickname diawali dengan @">
                            </div>
                            
                          </div>
                      </div>

                      <div class="form-group ">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Deskripsi Organisasi</label>
                          <div class="col-sm-9">
                            <div class="">
                              <textarea class="form-control" id="exampleTextarea" rows='30' cols="30" placeholder="Tulis deskripsi anda disini....." name="deskripsi" style="width: 100%; height:200px;"></textarea>
                            </div>
                            
                          </div>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Kampus</label>
                        <div class="col-sm-9">
                          <select class="form-select form-select-sm" aria-label="Default select example" name="kampus_id">
                            <option selected>Open this select menu</option>
                            @foreach ($kampus as $item)
                                   <option value="{{ $item->id }}">{{ $item->nama_kampus }}</option>          
                            @endforeach
                            
                          </select>
                        </div>
                      </div>

                      <div class="form-group ">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Password</label>
                          <div class="col-sm-9">
                            <div class="">

                               <input class="form-control form-control-sm" type="password" required  name='password'>
                            </div>
                            
                          </div>
                      </div>

                      <div class="form-group ">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Confirm Password</label>
                          <div class="col-sm-9">
                            <div class="">

                               <input class="form-control form-control-sm" type="password" required  name='confirm_password'>
                            </div>
                            
                          </div>
                      </div>


                      <div class="pt-lg-3 pt-3">
                        <button type="submit" class="btn btn-primary btn-sm " onclick="showAlert('apakah ada yakin menambahkan data s ini')">Submit</button>
                       
                        <a href="{{ route('dasboard_admin') }}">
                          <button type="button" class="btn btn-light btn-sm">Cancel</button>
                        </a>
                      </div>
                        </form>
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