
      @foreach($harian as $data)
      @php
      $dat = explode(":" , $data->jam);
             $H = $dat[0] * 60;
             $hasil = $H + $dat[1];
      @endphp
      <tr>
        <td style="width:10%">{{$data->tgl}}</td>
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
