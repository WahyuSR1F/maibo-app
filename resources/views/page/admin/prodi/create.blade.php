@extends('componen.main_admin')


@section('content1')
    <div class="m-lg-3">
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Menambahkan Prodi</h4>
                    <form class="forms-sample" action="" method="POST">
                      @csrf
                      <div class="form-group ">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nama Prodi</label>
                          <div class="col-sm-9">
                            <div class="">

                               <input class="form-control form-control-sm" type="text" required >
                            </div>
                            
                          </div>
                      </div>
                      <div class="form-group ">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Username</label>
                          <div class="col-sm-9">
                            <div class="">

                               <input class="form-control form-control-sm" name="username" type="text" required >
                            </div>
                            
                          </div>
                      </div>

                      <div class="form-group ">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">password</label>
                          <div class="col-sm-9">
                            <div class="">

                               <input class="form-control form-control-sm" name="organisasi" type="password" required >
                            </div>
                            
                          </div>
                      </div>

                      <div class="form-group ">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Confirm password</label>
                          <div class="col-sm-9">
                            <div class="">

                               <input class="form-control form-control-sm" name="organisasi" type="password" required >
                            </div>
                            
                          </div>
                      </div>

                      <div class="pt-lg-3 pt-3">
                        <button type="submit" class="btn btn-primary btn-sm " onclick="showAlert('apakah ada yakin menambahkan data s ini')">Submit</button>
                       
                        <a href="{{ route('viewPage',['page' => 'page.admin.dashboard']) }}">
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