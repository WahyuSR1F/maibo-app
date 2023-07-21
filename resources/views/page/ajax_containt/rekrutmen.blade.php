
      <div class="m-lg-5">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Daftar Rekrutment Organisasi</h4>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name Rekrutment</th>
                      <th>Gambar</th>
                      <th>deskripsi</th>
                      <th>status</th>
                      <th>Open at</th>
                      <th>Close at</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td class="next-hidden">Opening Rekrutment Anggota Baru Robotika</td>
                      <td><img class="img-xls rounded" src="https://tse4.mm.bing.net/th?id=OIP.vNUxVlZmRsnT3e54v8oW_gHaHp&pid=Api&P=0&h=180" alt=""></td>
                      <td class="next-hidden">Elit enim ex laborum deserunt aute qui fugiat sit. Amet qui eu pariatur nostrud enim in cupidatat incididunt anim Lorem. Cupidatat ipsum cillum incididunt velit.</td>
                      <td><label for="" class="badge badge-success">Opened</label></td>
                      <td><label for="" class="badge badge-dark">12-07-2023</label></td>
                      <td><label for="" class="badge badge-danger">20-07-2023</label></td>
                      <td>
                        <div class="d-flex m-1 justify-content-between">
                            <a href="{{ route('viewPage',['page' => 'page.rekrutmen.detail_page']) }}"><label class="badge badge-success m-1">view</label></a>
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




