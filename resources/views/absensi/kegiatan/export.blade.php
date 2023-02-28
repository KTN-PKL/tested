

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
		<h1>Absen Kegiatan</h1>
	</center>
<div>
<h3>Name   : {{ $fasdes->name }}</h3> 
<h3>Alamat : @if($fasdes->alamat <> null)
  {{$fasdes->alamat}}
  @else
  Alamat Belum ditentukan.
  @endif</h3> 
  <h3>Kecamatan :{{$fasdes->kecamatan}}</h3>
  <h3>Desa :{{$fasdes->desa}}</h3>
</div> 

<table class="table table-bordered table-responsive">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Waktu</th>
              <th>Kegiatan</th>
              <th>Deskripsi</th>
              <th>Pelatihan</th>
              <th>Selfie</th>
              <th>Foto Kegiatan</th>
              <th>Judul Pelatihan</th>
              <th>Durasi Pelatihan</th>
              <th>Tempat Pelatihan</th>
              <th>Foto Pelatihan</th>

            </tr>
          </thead>
          <tbody>
            @php
            $i=0;
            @endphp
            @foreach($kegiatan as $data)
            @php
            $i=$i+1;
            @endphp
            <tr>
              <td>{{$i}}</td>
              <td>{{$data->tanggalabsen}}</td>
              <td>{{$data->waktuabsen}} WIB</td>
              <td>{{$data->jeniskegiatan}}</td>
              <td>{{$data->deskripsikegiatan}}</td>
              <td>{{$data->pelatihan}}</td>
              <td><img class="img-thumbnail" src="{{asset('/foto/absenkegiatan/'. $data->selfiekegiatan)}}" width="80px" alt=""></td>
              <td><img class="img-thumbnail" src="{{ asset('foto/absenkegiatan/'. $data->fotokegiatan) }}" width="80px" alt=""></td>
              @if($data->pelatihan == "pelatihan")
              <td>{{ $data->judulpelatihan }}</td>
              <td>{{ $data->durasipelatihan }}</td>
              <td>{{ $data->tempatpelatihan }}</td>
              <td><img class="img-thumbnail" src="{{ asset('foto/absenkegiatan/'. $data->fotopelatihan) }}" width="80px" alt=""></td>
              @else
              <td>Non Pelatihan</td>
              <td>Non Pelatihan</td>
              <td>Non Pelatihan</td>
              <td>Non Pelatihan</td>
              @endif
              
            </tr>
            @endforeach
          </tbody>
        </table>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    $(document).ready(function() {
        window.print();
        $(".action-button").click();
} );
</script>
</body>
</html>
