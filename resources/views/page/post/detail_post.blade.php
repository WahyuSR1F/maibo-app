@extends('componen.main')
@section('content1')
    
<section id="detail">
    <div class="m-lg-2 mt-lg-0 mt-3">
        <div class="container-fluid">
            <div class="bg-light p-lg-2 rounded-2">
                <div class="row ">

                    <div class="col-lg-12 m-lg-2">
                        <div class="row">
                            <div class="col-lg-4 mt-lg-3">
                                
                                <div class="card rounded-9">
                                    <img class="img-thumbnail rounded" src="{{ asset('storage/dataApp/post/img/'.$gambar->foto) }}" alt="">
                                </div>

                                <div class="mt-4 d-flex justify-content-start">
                                    <a href=""> <button class="btn btn-primary btn-sm m-1">Edit <span><ion-icon name="pencil-outline"></ion-icon></span></button></a>
                                    <a href=""> <button class=" m-1 btn btn-warning btn-sm ">Cancel <ion-icon name="ban-outline"></ion-icon></button></a>
                                </div>
                            </div>
                            <div class="col-lg-8 mt-lg-3 mt-3">
                                <div class="row">
                                    <div class="card">
                             
                                        <div class="card-body">
                                          <h3 class="card-title title">Detail Postt :</h3>
                       
                                          <h6> <label class="badge badge-success mt-1">{{ $post->created_at }}</label></h6>
                                          <h6> <label class="badge badge-success mt-1">{{ $post->updated_at }}</label></h6>
                                        </div>  
                                    </div>

                                    <div class="card mt-lg-4 mt-lg-3 mt-3">
                                        <div class="card-body">
                                             <h3 class="card-title title">Deskripsi</h3>

                                             <textarea id="myTextarea" oninput="adjustTextareaSize(this)" class=" border-0 bg-white" rows="50" cols="50" disabled >{{ $post->deskripsi }}</textarea>
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
    </div>
</section>


<script>
function adjustTextareaSize(textarea) {
  var rows = textarea.value.split("\n").length;
  console.log(rows)
  var cols = textarea.value.split("\n").reduce(function (prev, current) {
    return Math.max(prev, current.length);
  }, 0);
  
  textarea.rows = rows;
  textarea.cols = cols;
}
</script>
@endsection