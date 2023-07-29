
@extends('componen.main')


@section('content1')
    <div class="m-lg-3">
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Event/Kegiatan</h4>
                    <form class="forms-sample" action="{{ route('edit_event_prosess') }}" method="POST" enctype="multipart/form-data">
                      @csrf

                      <input type="hidden" name="id" value="{{ $event->id }}">
                      <div class="form-group">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Judul Event</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="exampleInputUsername2" placeholder="judul event" name="title" value="{{ $event->title }}" required>
                          @error('title')
                          <div class="alert alert-danger mt-1">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group ">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Deskripsi Kegiatan</label>
                          <div class="col-sm-9">
                            <div class="">
                              <textarea class="border-wheat"  id="exampleFormControlTextarea3" name="deskripsi" cols="60" rows="9" placeholder="deskripsi kegiatan"  required>{{ $event->deskripsi }}</textarea>
                              @error('deskripsi')
                              <div class="alert alert-danger mt-1">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                      </div>

                      <div class="form-group ">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Registration Start</label>
                          <div class="col-sm-9">
                            <div class="">
                               <input type="date" class="form-control" id="exampleInputUsername2" placeholder="Registration Start" name="registration_start" value="{{ $event->registration_start }}"  required>
                               @error('registration_start')
                              <div class="alert alert-danger mt-1">{{ $message }}</div>
                              @enderror
                              </div>
                          </div>
                      </div>

                      <div class="form-group ">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Registration close</label>
                          <div class="col-sm-9">
                            <div class="">
                               <input type="date" class="form-control" id="exampleInputUsername2" placeholder="Registration Close" name="registration_close" value="{{ $event->registration_close }}" required>
                               @error('registration_close')
                               <div class="alert alert-danger mt-1">{{ $message }}</div>
                               @enderror
                              </div>
                          </div>
                      </div>

                      <div class="form-group ">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Event Start</label>
                          <div class="col-sm-9">
                            <div class="">
                               <input type="date" class="form-control" id="exampleInputUsername2" placeholder="Event Start" name="event_start" value="{{ $event->event_start }}" required>
                               @error('event_start')
                               <div class="alert alert-danger mt-1">{{ $message }}</div>
                               @enderror
                              </div>
                          </div>
                      </div>

                      <div class="form-group ">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Event close</label>
                          <div class="col-sm-9">
                            <div class="">
                               <input type="date" class="form-control" id="exampleInputUsername2" placeholder="Event close" name="event_close" value="{{ $event->event_close }}" required>
                               @error('event_close')
                               <div class="alert alert-danger mt-1">{{ $message }}</div>
                               @enderror
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">jenis event</label>
                        <div class="col-sm-9">
                          <select class="form-select form-select-sm" aria-label="Default select example" name="jenis_event_id" required>
                            @if ( $event->jenis_event_id == '1')
                            <option value="1" selected>webinar</option>
                            @elseif($event->jenis_event_id == '2')
                            <option value="2" selected>lomba</option>
                            @elseif($event->jenis_event_id == '3')
                            <option value="3" selected>expo</option>
                            @else
                            <option value="4" selected>pelatihan</option>
                            @endif
                            @foreach ($jenis as $item)
                       
                            <option value="{{$item->id}}">{{ $item->nama }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>


                      <div class="form-group">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                          <select class="form-select form-select-sm" aria-label="Default select example" name="status" required>
                            @if ( $event->status == 'ongoin')
                            <option value="1" selected>{{ $event->status }}</option>
                            @elseif($event->status == 'open')
                            <option value="2" selected>{{ $event->status }}</option>
                            @elseif($event->status == 'close')
                            <option value="3" selected>{{ $event->status }}</option>
                            @else
                            <option value="4" selected>{{ $event->status }}</option>
                            @endif
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
                          <select class="form-select form-select-sm" aria-label="Default select example" name="status_view" required>
                            @if($event->status_view == '1')
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
                </div>
              </div>

              <div class="col-lg-5 col-12 grid-margin">
                  <div class="card">
                    <p class="card-title p-3">Uploud Gambar</p>
                    <p class="" style="padding-left: 20px">Foto lama</p>
                    @if ($gambar->foto)
                        <img class="img-fluid m-4" src="{{ asset('storage/dataApp/event/img/'.$gambar->foto)  }}" class="card-img-top" alt="...">
                        
                    @else
                        <div class="text-center m-2 pt-1 text-wheat">
                          <p><span></p><ion-icon name="document-outline"></ion-icon></span>
                          <p>gambar belum diimputkan</p>
                          
                           
                        </div>
                    @endif
                       
                    <div class="card-body">
                      <p>Foto Update ?</p>
                        
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