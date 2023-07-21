@extends('componen.main')

@section('content1')
    <div class="m-lg-3">
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Menambahkan Postingan</h4>
                    <form class="forms-sample" action="" method="POST">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Uploud Image</label>
                        
                        <div class="input-group ">
                          <input type="file" class="form-control form-control-sm" id="inputGroupFile04" aria-describedby="button-addon2" aria-label="Upload" name="file[]" multiple=true>
                        </div>
                      </div>
                      <div class="form-group ">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Deskripsi Kegiatan</label>
                          <div class="col-sm-9">
                            <div class="">
                              <textarea class="border-wheat form-control-sm"  id="exampleFormControlTextarea3" cols="50" rows="9" placeholder="deskripsi kegiatan"></textarea>
                            </div>
                            
                          </div>
                      </div>
                      <div class="pt-lg-3 pt-3">
                        <button type="submit" class="btn btn-primary btn-sm " onclick="showAlert('apakah ada yakin menambahkan post ini')">Submit</button>
                        </form>
                        <a href="">
                          <button class="btn btn-light btn-sm">Cancel</button>
                        </a>
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