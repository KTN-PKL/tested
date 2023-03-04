

<!DOCTYPE html>
<html>
<head>




	<title>Absen Kegiatan</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 
	<center>
		<h1>Absen Harian</h1>
	</center>
<div>
<h3>Name   : {{ $fasdes->name }}</h3> 
<h3>Alamat : @if($fasdes->alamat <> null)
  {{$fasdes->alamat}}
  @else
  Alamat Belum ditentukan.
  @endif</h3> 
</div> 

<table class="table table-bordered table-responsive">
          <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jam Masuk</th>
                <th>Foto Fasdes Masuk</th>
                <th>Foto Kegiatan Masuk</th>
                <th>Deskripsi Masuk</th>
                <th>Jam Pulang</th>
                <th>Foto Fasdes Pulang</th>
                <th>Foto Kegiatan Pulang</th>
                <th>Deskripsi Pulang</th>
                <th>Jenis</th>
                <th>status</th>
            </tr>
          </thead>
          <tbody>
            @php
            $i=0;
            @endphp
            @foreach($harian as $data)
            @php
            $i=$i+1;
            @endphp
            <tr>
              <td>{{$i}}</td>
              <td>{{$data->tgl}}</td>
              <td>{{$data->jam}} WIB</td>
              <td><img class="img-thumbnail" src="{{public_path('/foto/'. $data->fotofasdes)}}" width="80px" alt=""></td>
              <td><img class="img-thumbnail" src="{{ public_path('foto/'. $data->fotokegiatanharian) }}" width="80px" alt=""></td>
              <td>{{$data->deskripsi}}</td>
              @if ($data->jampulang <> null)
              <td>{{ $data->jampulang }}</td>
              <td><img class="img-thumbnail" src="{{public_path('/foto/'. $data->fotofasdespulang)}}" width="80px" alt=""></td>
              <td><img class="img-thumbnail" src="{{ public_path('foto/'. $data->fotokegiatanharianpulang) }}" width="80px" alt=""></td>
              <td>{{ $data->deskripsipulang }}</td>
              @else
              <td>Tidak Absen Pulang</td>
              <td>Tidak Absen Pulang</td>
              <td>Tidak Absen Pulang</td>
              <td>Tidak Absen Pulang</td>
              @endif
              <td>{{ $data->jenis }}</td>
              <td>@php
                $dat = explode(":" , $data->jam);
                 $H = $dat[0] * 60;
                 $hasil = $H + $dat[1];
                @endphp
                @if ($hasil > 420)
                Terlambat
                @else
                Tepat Waktu
                @endif</td>
            </tr>
            @endforeach
          </tbody>
        </table>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
{{-- <script>
    $(document).ready(function() {
        window.print();
        $(".action-button").click();
} );
</script> --}}
</body>
</html>
