@foreach ($prodi as $itemp)
    
@endforeach
@extends('componen.main_admin')


@section('content1')
    <div class="m-lg-3">
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit data Prodi</h4>
                    <form  id="form-edit" class="forms-sample" action="{{ route('prodi_edit_prosess') }}" method="POST">
                      @csrf
                      <input type="hidden" name="id" value="{{ $itemp->id }}">
                      <div class="form-group ">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nama Prodi</label>
                          <div class="col-sm-9">
                            <div class="">

                               <input class="form-control form-control-sm" type="text" required name="nama_prodi" value="{{ $itemp->nama_prodi }}">
                            </div>
                            
                          </div>
                      </div>

                      <div class="form-group ">
                        <label for="jurusan" class="col-sm-3 col-form-label">Jurusan</label>
                          <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="jurusan" name="jurusan_id" required>
                            <option selected>Open this select menu</option>
                            @foreach ($jurusan as $item)
                                 <option value="{{ $item->id }}">{{ $item->nama_jurusan }}</option>
                            @endforeach
                           
                            
                          </select>
                        
                      </div>

                     

                      <div class="pt-lg-3 pt-3">
                        <button type="button" class="btn btn-primary btn-sm " onclick="showAlertEdit()">Submit</button>
                       
                        <a href="{{ route('prodi_view') }}">
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