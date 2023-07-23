@extends('componen.main_admin')


@section('content1')
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: '{{ session('success') }}'
        });
    </script>
@endif
@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'gagal',
            text: '{{ session('success') }}'
        });
    </script>
@endif
    <div class="m-lg-3">
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Menambahkan Data jurusan</h4>
                    <form id="form-create" class="forms-sample" action="{{ route('jurusan_create_prosess')  }}" method="POST">
                      @csrf
                      <div class="form-group ">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nama jurusan</label>
                          <div class="col-sm-9">
                            <div class="">

                               <input class="form-control form-control-sm" type="text" required name="nama_jurusan">
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

                      <div class="pt-lg-3 pt-3">
                        <button type="button" onclick="showAlertCreate()" class="btn btn-primary btn-sm ">Submit</button>
                       
                        <a href="{{ route('jurusan_view') }}">
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