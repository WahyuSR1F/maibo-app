
@extends('componen.main_admin')
@section('content1')
    <div class="m-lg-3" >
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Data Kampus</h4>
                    <form class="forms-sample" action="{{ route('kampus_edit_prosses') }}" method="POST">
                      @csrf
                      <input type="hidden" name="id" value="{{ $kampus->id }}">
                      <div class="form-group ">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nama Kampus</label>
                          <div class="col-sm-9">
                            <div class="">

                               <input class="form-control form-control-sm" type="text" required  name="nama_kampus" value="{{ $kampus->nama_kampus }}">
                            </div>
                            
                          </div>
                      </div>

                      <div class="pt-lg-3 pt-3">
                        <button type="submit" class="btn btn-primary btn-sm " onclick="showAlert('apakah ada yakin menambahkan data kampus ini')">Submit</button>
                       
                        <a href="{{ route('kampus_view') }}" onclick="showAlert('edit anda tidak akan disimpan')">
                          <button type="button"  class="btn btn-light btn-sm">Cancel</button>
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