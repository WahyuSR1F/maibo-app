
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
                          <th>Deskripsi</th>
                          <th>Status</th>
                          <th>Created</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($post as $item)
                        <tr>
                          <td>1</td>
                          <td class="next-hidden">{{ $item->deskripsi }}</td>
                          @if ($item->status =='public')
                          <td><label class="badge badge-success p-2">{{ $item->status }}</label></td>
                          @elseif ($item->status == 'privat')
                          <td><label class="badge badge-warning p-2">{{ $item->status }}</label></td>
                          @endif

                          <td><label for="" class="badge badge-dark p-2">{{ $item->updated_at }}</label></td>
                           <td>
                            <div class="d-flex m-1 justify-content-start">
                                <a href="{{ route('organisasi_post_detail',['id' => $item->id]) }}"><button class="btn btn-success btn-sm m-1">View</button></a>
                                <a href="{{ route('organisasi_post_edit_view',['id' => $item->id]) }}"><button class="btn btn-warning btn-sm m-1">Edit</button></a>

                                
                                <button type="button" onclick="showAlertDelete('post/delete',{{ $item->id }})" class="btn btn-danger btn-sm m-1">Delete</button>
                            </div>
                            </td>
                        </tr>
                        @endforeach
                       
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