<table class="datatable">
    <thead>
      <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Jam Masuk</th>
        <th>Foto Fasdes Masuk</th>
        <th>Foto Kegiatan Masuk</th>
        <th>Jam Pulang</th>
        <th>Foto Fasdes Pulang</th>
        <th>Foto Kegiatan Pulang</th>
        <th>status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @php
      $i=0;
      @endphp
      @foreach($harian as $data)
      @php
      $i=$i+1;
      $dat = explode(":" , $data->jam);
             $H = $dat[0] * 60;
             $hasil = $H + $dat[1];
      @endphp
      <tr>
        <td style="width:7%">{{$i}}</td>
        <td>{{$data->tgl}}</td>
        <td>{{ $data->jam }}</td>
        <td><img src="{{asset('/foto/'. $data->fotofasdes)}}"  alt="Gambar" width="80px" height="80px"></td>
        <td><img src="{{asset('/foto/'. $data->fotokegiatanharian)}}"  alt="Gambar" width="80px" height="80px"></td>
        <td>{{ $data->jampulang }}</td>
        <td><img src="{{asset('/foto/'. $data->fotofasdespulang)}}"  alt="Gambar" width="80px" height="80px"></td>
        <td><img src="{{asset('/foto/'. $data->fotokegiatanharianpulang)}}"  alt="Gambar" width="80px" height="80px"></td>
        <td>@if ($hasil > 420)
            Terlambat
            @else
            Tepat Waktu
        @endif</td>
      </tr>
      @endforeach
    </tbody>
  </table>