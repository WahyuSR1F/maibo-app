@extends('componen.main')


@section('content1')
    <div class="m-lg-3">
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Post</h4>
                    <form class="forms-sample">
                      <div class="col-lg-5">
                         <div class="card m-lg-3">
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
                            
                        </div>
                      </div>
                     
                      <div class="form-group">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Uploud Image</label>
                        
                        <div class="input-group ">
                          <input type="file" class="form-control form-control-sm" id="inputGroupFile04" aria-describedby="button-addon2" aria-label="Upload">
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

                    </div>
                    <div class="m-3 pt-lg-3 pt-3">
                      <button type="submit" onclick="showAlert('apakah sudah benar')" class="btn btn-primary btn-sm ">Submit</button>
                      <a href="{{ route('viewPage',['page'=>'page.event.allview_page']) }}">
                        <button class="btn btn-light btn-sm" onclick="showAlert('perubahan anda tidak disimopan')">Cancel</button>
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


@endsection