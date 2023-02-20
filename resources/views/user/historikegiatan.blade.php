<h6 style="color:grey">Absen Kegiatan</h6>
       @forelse($absenkegiatan as $datas)
       <div class="card shadow" style="width: 100%">
        <div class="card-body">
          <div class="row">
            <div class="col-8">
              <p class="fw-bold">{{$datas->tanggalabsen}} {{$datas->waktuabsen}}</p>
              <p class="fw-bold">Absen Kegiatan {{$datas->jeniskegiatan}}</p>
            </div>
            <div class="col-4 fw-bold">Status : <span class="badge bg-primary">Absen Kegiatan</span></div>
          </div>
        </div>
        @empty
        <p class="bg-primary text-white p-1">Belum Ada Absen Kegiatan</p>
      </div> 
       @endforelse