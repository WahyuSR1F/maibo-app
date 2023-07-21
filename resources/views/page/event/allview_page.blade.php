@extends('componen.main')

@section('content1')
      <div class="m-lg-5">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Daftar Event Organisasi</h4>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name Event</th>
                      <th>jenis</th>
                      <th>private</th>
                      <th>status</th>
                      <th>Partisipasi</th>
                      <th>Registration Start</th>
                      <th>Registration Close</th>
                      <th>Event Start</th>
                      <th>Event Close</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td class="next-hidden">GRAND OPENING AI'TERAS CAFE</td>
                      <td>Expo</td>
                      <td><label class="badge badge-success">public</label></td>
                      <td><label for="" class="badge badge-success">Opened</label></td>
                      <td>120</td>
                      <td><label for="" class="badge badge-dark">12-07-2023</label></td>
                      <td><label for="" class="badge badge-danger">20-07-2023</label></td>
                      <td><label for="" class="badge badge-dark">12-07-2023</label></td>
                      <td><label for="" class="badge badge-danger">20-07-2023</label></td>
                      <td>
                        <div class="d-flex m-1 justify-content-between">
                            <a href="{{ route('viewPage',['page' => 'page.event.detail_page']) }}"><label class="badge badge-success m-1">view</label></a>
                            <a href="{{ route('viewPage',['page' => 'page.event.edit_page']) }}"><label class="badge badge-warning m-1">Edit</label></a>
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
@endsection



