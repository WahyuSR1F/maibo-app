@extends('componen.main')


@section('content1')
    <div class="m-lg-3">
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Event/Kegiatan</h4>
                    <form class="forms-sample">
                      <div class="form-group">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Judul Event</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Username">
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
                      <div class="form-group">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Jenis</label>
                        <div class="col-sm-9">
                          <select class="form-select form-select-sm" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">Webinar</option>
                            <option value="2">Lomba</option>
                            <option value="3">Pelatihan</option>
                            <option value="3">Expo</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Kategori</label>
                        <div class="col-sm-9">
                          <select class="form-select form-select-sm" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">public</option>
                            <option value="2">privasi</option>
                          </select>
                        </div>
                      </div>
                     
                  </div>
                </div>
              </div>

              <div class="col-lg-5 col-12 grid-margin">
                  <div class="card">
                    @php
                        $resource=['img' => null];
                        
                    @endphp
                    @if ($resource['img'] == !null)
                        <img src="..." class="card-img-top" alt="...">
                        
                    @else
                        <div class="text-center m-2 pt-2 text-wheat">
                          <p><span></p><ion-icon name="document-outline"></ion-icon></span>
                          <p>gambar belum diimputkan</p>
                          
                           
                        </div>
                    @endif
                       
                    <div class="card-body">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Uploud Image</label>
                          <div class="input-group ">
                            <input type="file" class="form-control form-control-sm" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                          </div>
                          <div class="pt-lg-3 pt-3">
                            <button type="submit" class="btn btn-primary btn-sm " onclick="showAlert('apakah anda yakin mengedit ini')">Submit</button>
                            <a  onclick="showAlert('Perubahan anda tidak tersimpan') href="{{ route('viewPage',['page'=>'page.event.allview_page']) }}">
                              <button class="btn btn-light btn-sm" onclick="showAlert('apakah anda yakin menghapus data ini')">Cancel</button>
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


@endsection