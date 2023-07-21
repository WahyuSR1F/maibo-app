@extends('componen.main')

@section('content1')
<section id="anggota">
    <div class="m-lg-3 m-1">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Post List</h4>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Picture</th>
                          <th>Deskripsi</th>
                          <th>Create at</th>
                          <th>Update at</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td><img class="img-xls rounded" src="asset('assets/img/PNG/1.png')" alt=""></td>
                          <td class="next-hidden">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, doloremque illo ab necessitatibus quam cupiditate unde quis earum expedita quae neque ipsum eveniet consequatur in corrupti optio molestias tenetur? Veritatis.</td>
                          <td><label for="" class="badge badge-dark">12/01/2023</label></td>
                          <td><label for="" class="badge badge-dark">12/02/2023</label></td>
                           <td>
                            <div class="d-flex m-1 justify-content-start">
                                <a href="{{ route('viewPage',['page' => 'page.post.detail_post']) }}"><label class="badge badge-success m-1">view</label></a>
                                <a href="{{ route('viewPage',['page' => 'page.post.edit_page']) }}"><label class="badge badge-warning m-1">Edit</label></a>
                                <a href="" onclick="showAlert('apakah anda yakin menghapus data ini')"><label class="badge badge-danger m-1">Delete</label></a>
                            </div>
                            </td>
                        </tr>
                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</section>
@endsection