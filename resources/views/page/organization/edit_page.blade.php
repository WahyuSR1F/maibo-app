@extends('componen.main')


@section('content1')
    <div class="m-lg-3">
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Status Pangkat </h4>
                    <form class="forms-sample" action="{{ route('organisasi_anggota_edit_prosess') }}" method="POST">
                      @csrf
                      <input type="hidden" name="id" value="{{ $anggota->id }}">
                      <div class="form-group">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Jenis</label>
                        <p class="text-danger">Noted : perhatikan dalam pengisian tingkat jabatan </p>
                        <div class="col-sm-9">
                          <select class="form-select form-select-sm" name="status_pangkat" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">Ketua</option>
                            <option value="2">Wakil</option>
                            <option value="3">Sekretaris</option>
                            <option value="4">Bendahara</option>
                            <option value="5">Co Devisi</option>
                            <option value="6">Anggota</option>
                          </select>
                        </div>
                      </div>
                      <div class="pt-lg-3 pt-3">
                        <button type="submit" class="btn btn-primary btn-sm ">Submit</button>
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


@endsection