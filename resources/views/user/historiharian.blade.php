<h6 style="color:grey">Absen Harian</h6>
@forelse($absenharian as $data)
<div class="card shadow" style="width: 100%">
  <div class="card-body">
    <div class="row">
      <div class="col-8">
        <p class="fw-bold">{{$data->tgl}} {{$data->jam}}</p>
        <p class="fw-bold">Absen Harian</p>
      </div>
      <div class="col-4 fw-bold">Status :  
        <span class="badge bg-success">Absen Masuk</span>
        @if($data->jampulang <> null)  <span class="badge bg-warning">Absen Pulang</span>  
        @else
        <span class="badge bg-danger">Belum Absen Pulang</span>  
        @endif 
      </div>
    </div>
    <center>
      <div class="foot">
        <a href="{{route('fasdes.detailabsenharian', $data->id_absenharian)}}"><i class="fa-solid fa-eye"></i></a>
      </div>
    </center>
  </div>
</div>  
@empty
<p class="bg-danger text-white p-1">Belum Ada Absen Harian</p>
@endforelse