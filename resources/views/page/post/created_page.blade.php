@extends('componen.main')

@section('content1')
    <div class="m-lg-3">
        <div class="row">
            <div class="col-lg-6 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Menambahkan Postingan</h4>
                    <p class="p-2 text-danger">Noted : Mohon Pengisian Postingan harus dilakukan crop gambar untuk memastika ukuran gambar sama !!</p>
                    <form class="forms-sample" action="{{ route('organisasi_post_create_prosess') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group m-3">
                        <input type="file" name="foto" id="gambar" class="form-control" required>
                          @error('foto')
                              <div class="alert alert-danger">{{ $message }}</div>
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
                        
                       
                  </div>
                </div>
              </div>

              <div class="col-lg-12 stretch-card ">
                <div class="card">
                  <div class="card-body">
                
                      <div class="form-group ">
                        <label for="exampleInputEmail2" class="col-form-label">Deskripsi Kegiatan</label>
                        @error('deskripsi')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                          <div class="col-sm-9">
                            <div class="">
                              <textarea class="border-wheat" name="deskripsi"  id="exampleFormControlTextarea3" cols="50" rows="10" placeholder="deskripsi kegiatan"></textarea>
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
                            <option selected>Open this select menu</option>
                            <option value="1">private</option>
                            <option value="2">public</option>
                          </select>
                        </div>
                      </div>

                      <div class="pt-lg-3 pt-3">
                        <button type="submit" class="btn btn-primary btn-sm " onclick="showAlert('apakah ada yakin menambahkan post ini')">Submit</button>
                        </form>
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