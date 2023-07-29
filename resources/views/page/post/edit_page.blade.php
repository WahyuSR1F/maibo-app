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
@extends('componen.main')


@section('content1')
    <div class="m-lg-3">
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Post</h4>
                    <form class="forms-sample" action="{{ route('organisasi_post_prosses') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="id" value="{{ $post->id }}">
                      <div class="col-lg-5">
                         <div class="card m-lg-3">
                          @if ($gambar->foto)
                         
                             <img src="{{ asset('storage/dataApp/post/img/'.$gambar->foto) }}" alt="">
                              
                          @else
                              <div class="text-center m-2 pt-2 text-wheat">
                                <p><span></p><ion-icon name="document-outline"></ion-icon></span>
                                <p>gambar belum diimputkan</p>
                                
                                
                              </div>
                          @endif
                            
                        </div>
                      </div>

                      <div class="form-group ">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Deskripsi Kegiatan</label>
                          <div class="col-sm-9">
                            <div class="">
                              <textarea class="border-wheat"  id="exampleFormControlTextarea3" name="deskripsi" cols="50" rows="9" placeholder="deskripsi kegiatan"  required > {{ $post->deskripsi }}</textarea>
                              @error('deskripsi')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
                            
                          </div>
                       </div>

                      <div class="form-group">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Status View</label>
                        @error('status_view')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="col-sm-9">
                          <select class="form-select form-select-sm" aria-label="Default select example" name="status_view" required>
                            @if($post->status_view == '1')
                            <option value="1" selected>private</option>
                            @else
                            <option value="2" selected>public</option>
                            @endif
                            <option value="1">private</option>
                            <option value="2">public</option>
                          </select>
                        </div>
                      </div>

                    </div>
                    <div class="m-3 pt-lg-3 pt-3">
                      <button type="submit" onclick="showAlert('apakah sudah benar')" class="btn btn-primary btn-sm ">Submit</button>
                      <a href="{{ route('organisasi_post_view') }}">
                        <button class="btn btn-warning btn-sm" >Cancel</button>
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