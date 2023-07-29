@extends('componen.main')

@section('content1')
    <div class="m-lg-3">
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Menambahkan Rekrutment</h4>
                    <form class="forms-sample" action="{{ route('organisasi_rekrutmen_edit_prosess') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="id" value="{{ $rekrutmen->id }}">
                      <div class="form-group">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Judul Rekrutment</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="exampleInputUsername2" placeholder="judul rekrutmen" name="title" value="{{ $rekrutmen->title }}">
                          @error('title')
                          <div class="alert alert-danger mt-1">{{ $message }}</div>
                          @enderror
                        </div>
                        
                      </div>
                      <div class="form-group ">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Deskripsi Kegiatan</label>
                          <div class="col-sm-9">
                            <div class="">
                              <textarea class="border-wheat" name="deskripsi"  id="exampleFormControlTextarea3" cols="50" rows="9" placeholder="deskripsi kegiatan">{{ $rekrutmen->deskripsi }}</textarea>
                              @error('deskripsi')
                              <div class="alert alert-danger mt-1">{{ $message }}</div>
                              @enderror
                            </div>
                            
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Mulai Pendaftaran</label>
                        <div class="col-sm-9">
                          <input type="date" class="form-control" id="exampleInputUsername2" placeholder="registration start" name="registration_start" value="{{ $rekrutmen->registration_start }}">
                          @error('registration_start')
                          <div class="alert alert-danger mt-1">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Penutupan Pendaftaran</label>
                        <div class="col-sm-9">
                          <input type="date" class="form-control" id="exampleInputUsername2" placeholder="registration close" name="registration_close" value="{{ $rekrutmen->registration_close }}">
                          @error('registration_close')
                          <div class="alert alert-danger mt-1">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Pelaksanaan Event</label>
                        <div class="col-sm-9">
                          <input type="date" class="form-control" id="exampleInputUsername2" placeholder="event_start" name="event_start" value="{{ $rekrutmen->event_start }}">
                          @error('event_start')
                          <div class="alert alert-danger mt-1">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Akhir Penutupan Event</label>
                        <div class="col-sm-9">
                          <input type="date" class="form-control" id="exampleInputUsername2" placeholder="event_close" name="event_close" value="{{ $rekrutmen->event_close }}">
                          @error('event_close')
                          <div class="alert alert-danger mt-1">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Status Event</label>
                        <div class="col-sm-9">
                          <select class="form-select form-select-sm" aria-label="Default select example" name="status">
                            @if ( $rekrutmen->status == 'ongoin')
                            <option value="1" selected>{{ $rekrutmen->status }}</option>
                            @elseif($rekrutmen->status == 'open')
                            <option value="2" selected>{{ $rekrutmen->status }}</option>
                            @elseif($rekrutmen->status == 'close')
                            <option value="3" selected>{{ $rekrutmen->status }}</option>
                            @else
                            <option value="4" selected>{{ $rekrutmen->status }}</option>
                            @endif
                            <option value="1">Ongoin</option>
                            <option value="2">Open</option>
                            <option value="3">Close</option>
                            <option value="4">End</option>
                          </select>
                          @error('status')
                          <div class="alert alert-danger mt-1">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-5 col-12 grid-margin">
                  <div class="card">
                    <p class="card-title p-3">Uploud Gambar</p>
                    <p class="" style="padding-left: 20px">Foto lama</p>
                    @if ($gambar->foto)
                        <img class="img-fluid m-4" src="{{ asset('storage/dataApp/rekrutmen/img/'.$gambar->foto)  }}" class="card-img-top" alt="...">
                        
                    @else
                        <div class="text-center m-2 pt-1 text-wheat">
                          <p><span></p><ion-icon name="document-outline"></ion-icon></span>
                          <p>gambar belum diimputkan</p>
                          
                           
                        </div>
                    @endif
                    <div class="card-body">
                        @csrf
                        <div class="form-group">
                          <div class="form-group">
                            <input type="file" name="foto" id="gambar" class="form-control">
                            @error('foto')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                            <input type="hidden" name="gambar_cropped" id="gambar_cropped">
                            <div class="p-3">
                              <img class="img-fluid" id="imagePreview" src="#" alt="Preview Gambar">
                            </div>
                            
                            <!-- Tombol untuk melakukan crop -->
                            <button class="btn btn-info" type="button" id="cropButton" disabled>Crop</button>
                            
                            <!-- Tempat untuk menampilkan crop area -->
                            <div class="p-3">
                                <img class="img-fluid" id="croppedPreview" src="#" alt="Hasil Crop Gambar">
                            </div>
                            <div class="pt-lg-3 pt-3">
                              <button  type="submit" class="btn btn-primary ">Submit</button>
                              <a href="">
                                <button type="button" class="btn btn-light ">Cancel</button>
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

    <script>
      const image = document.getElementById('imagePreview');
      const croppedPreview = document.getElementById('croppedPreview');
      const inputGambar = document.getElementById('gambar');
      const inputGambarCropped  = document.getElementById('gambar_cropped');
      const cropButton = document.getElementById('cropButton');
      let cropper;
    
      inputGambar.addEventListener('change', function (e) {
          const file = e.target.files[0];
          const reader = new FileReader();
    
          reader.onload = function (e) {
              image.src = e.target.result;
              if (cropper) {
                  cropper.destroy();
              }
              cropper = new Cropper(image, {
                  aspectRatio: 1, // Atur sesuai rasio yang diinginkan (1 untuk rasio persegi)
                  viewMode: 1,
                  movable: true,
                  zoomable: true,
                  scalable: false,
                  rotatable: false,
              });
              cropButton.removeAttribute('disabled');
          };
    
          reader.readAsDataURL(file);
      });
    
      cropButton.addEventListener('click', function () {
          const croppedCanvas = cropper.getCroppedCanvas();
          croppedPreview.src = croppedCanvas.toDataURL();  
    
          const crooped = croppedCanvas.toDataURL();  
          inputGambarCropped.value = crooped;
      });
    </script>
    
    
@endsection