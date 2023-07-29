
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
                      <th>Registration Start</th>
                      <th>Registration Close</th>
                      <th>Event Start</th>
                      <th>Event Close</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($event as $item)
                        
                   
                    <tr>
                      <td>{{ $i }}</td>
                      <td class="next-hidden">{{ $item->title }}</td>
                      <td>{{ $item->nama }}</td>
                      @if ($item->status_view =='public')
                      <td><label class="badge badge-success   p-2">{{ $item->status_view }}</label></td>
                      @elseif ($item->status_view == 'private')
                      <td><label class="badge badge-warning   p-2">{{ $item->status_view }}</label></td>
                      @endif

                      @if ($item->status == 'open')
                      <td><label for="" class="badge badge-success  p-2">Opened</label></td>  
                      @elseif($item->status == 'ongoing')
                      <td><label for="" class="badge badge-primary  p-2">ongoing</label></td>   
                      @elseif($item->status == 'close')
                      <td><label for="" class="badge badge-danger  p-2">Close</label></td>   
                      @else
                      <td><label for="" class="badge badge-dark  p-2">End</label></td>   
                      @endif
                      <td>{{ $item->registration_start }}</td>
                      <td>{{ $item->registration_close }}</td>
                      <td>{{ $item->event_start }}</td>
                      <td>{{ $item->event_close }}</td>
                      <td>
                        <div class="d-flex m-1 justify-content-between">
                            <a href="{{ route('organisasi_event_detail',['id' => $item->id]) }}"><button class="btn btn-success btn-sm m-1">View</button></a>
                            <a href="{{ route('edit_event_view',['id' => $item->id]) }}"><button class="btn btn-warning btn-sm m-1">Edit</button></a>
                            
                            <button class="btn btn-danger btn-sm m-1" type="button"  onclick="showAlertDelete('event/delete',{{ $item->id }})">Delete</button>
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



