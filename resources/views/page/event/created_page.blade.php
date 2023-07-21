@extends('componen.main')

@section('content1')
    <div class="m-lg-3">
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Menambahkan Event/Kegiatan</h4>
                    <form class="forms-sample" action="" method="POST">
                      @csrf
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

                      <div class="form-group ">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Registration Start</label>
                          <div class="col-sm-9">
                            <div class="">
                               <input type="date" class="form-control" id="exampleInputUsername2" placeholder="Registration Start" name="registration_close">
                            </div>
                          </div>
                      </div>

                      <div class="form-group ">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Registration close</label>
                          <div class="col-sm-9">
                            <div class="">
                               <input type="date" class="form-control" id="exampleInputUsername2" placeholder="Registration Close" name="registration_close">
                            </div>
                          </div>
                      </div>

                      <div class="form-group ">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Event Start</label>
                          <div class="col-sm-9">
                            <div class="">
                               <input type="date" class="form-control" id="exampleInputUsername2" placeholder="Event Start" name="event_start">
                            </div>
                          </div>
                      </div>

                      <div class="form-group ">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Event close</label>
                          <div class="col-sm-9">
                            <div class="">
                               <input type="date" class="form-control" id="exampleInputUsername2" placeholder="Event Start" name="event_close">
                            </div>
                          </div>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">jenis event</label>
                        <div class="col-sm-9">
                          <select class="form-select form-select-sm" aria-label="Default select example" name="status">
                            <option selected>Open this select menu</option>
                            <option value="1">Webiner</option>
                            <option value="2">Lomba</option>
                            <option value="3">Expo</option>
                            <option value="4">Pelatihan</option>
                          </select>
                        </div>
                      </div>


                      <div class="form-group">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                          <select class="form-select form-select-sm" aria-label="Default select example" name="status">
                            <option selected>Open this select menu</option>
                            <option value="1">Ongoing</option>
                            <option value="2">Open</option>
                            <option value="3">Close</option>
                            <option value="4">End</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Status View</label>
                        <div class="col-sm-9">
                          <select class="form-select form-select-sm" aria-label="Default select example" name="status_view">
                            <option selected>Open this select menu</option>
                            <option value="1">private</option>
                            <option value="2">public</option>
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
                        
                        <div class="form-group">
                          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Uploud Image</label>
                          <div class="input-group ">
                            <input type="file" class="form-control form-control-sm" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                          </div>
                          <div class="pt-lg-3 pt-3">
                            <button type="submit" class="btn btn-primary btn-sm ">Submit</button>
                            <a href="{{ route('viewPage',['page'=>'page.event.allview_page']) }}">
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


@endsection