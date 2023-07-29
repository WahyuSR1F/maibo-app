@extends('componen.main')

@section('content1')
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
                      <th>Status</th>
                      <th>Registration Start</th>
                      <th>Registration Close</th>
                      <th>Kegiatan dimulai</th>
                      <th>Kegiatan ditutup</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($rekrutmen as $item)
                    <tr>
                      <td>{{ $i }}</td>
                      <td class="text-bold next-hidden">{{ $item->title }}</td>
                      @if ($item->status == 'open')
                      <td><label for="" class="badge badge-success p-2">Opened</label></td>  
                      @elseif($item->status == 'ongoing')
                      <td><label for="" class="badge badge-primary p-2">ongoing</label></td>   
                      @elseif($item->status == 'close')
                      <td><label for="" class="badge badge-danger p-2">Close</label></td>   
                      @else
                      <td><label for="" class="badge badge-dark p-2">End</label></td>   
                      @endif
                      <td><label for="" class="badge badge-dark p-2">{{ $item->registration_start }}</label></td>
                      <td><label for="" class="badge badge-danger p-2">{{ $item->registration_close }}</label></td>
                      <td><label for="" class="badge badge-dark p-2">{{ $item->event_start }}</label></td>
                      <td><label for="" class="badge badge-danger p-2">{{ $item->event_close }}</label></td>

                      <td>
                        <div class="d-flex m-1 justify-content-between">
                            <a href="{{ route('organisasi_rekrutmen_view_detail',['id' => $item->id]) }}"><button class="btn btn-success btn-sm m-1">View</button></a>
                            <a href="{{ route('organisasi_rekrutmen_edit_view',['id' => $item->id]) }}"><button class="btn btn-warning btn-sm m-1">Edit</button></a>
                            <button onclick="showAlertDelete('rekrutmen/delete',{{ $item->id }})" class="btn btn-danger btn-sm m-1" type="button" onclick="">Delete</button>
                        </div>
                      </td>
                    </tr>
                    @php
                        $i++;
                    @endphp 
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
@endsection



