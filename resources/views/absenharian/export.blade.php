

<!DOCTYPE html>
<html>
<head>




	<title>Absen Harian</title>
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
    <h3>Kecamatan :{{$fasdes->kecamatan}}</h3>
    <h3>Desa :{{$fasdes->desa}}</h3>
    </div> 
	
@php
date_default_timezone_set("Asia/Jakarta");
$data1 = strtotime($dari);
$bulan1 = date('m', $data1);
$tahun1 = date('Y', $data1);
$hari1 = date('d', $data1);
$data2 = strtotime($sampai);
$bulan2 = date('m', $data2);
$tahun2 = date('Y', $data2);
$hari2 = date('d', $data2);
$bnow = date('m');
$tnow = date('Y');
$t = date("Y-m-d");
$d = date("D");
          $dayList = array(
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu',
            'Sun' => 'Minggu',
            );
$j = 0;
$dnow = date("j");
@endphp
<table class="table table-bordered table-responsive">
    <thead>
      <tr>
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
@for ($tahun = $tahun1; $tahun <= $tahun2 ; $tahun++)
@for ($bulan = $bulan1; $bulan <= $bulan2; $bulan++)
@php
      if ($bulan == $bulan1) {
        $jh = $hari1;
      } else {
        $jh = 1;
      }
      if ($bulan == $bulan2) {
        $hari = $hari2;
      } else {
        $kalender = CAL_GREGORIAN;
        $hari = cal_days_in_month($kalender, $bulan, $tahun);
      }
      
@endphp
@for ($i = $jh; $i <= $hari; $i++)
@php
            $now = strtotime($i."-".$bulan."-".$tahun);
            $d = date("D", $now);
@endphp
<tr>
    <td>{{$dayList[$d].", ".$i."-".$bulan."-".$tahun}}</td>
@php
    if($i < 10)
    {$i = "0".$i;}
@endphp
@if ($jumlah == 0)
@if ($bulan >= $bnow && $tahun >= $tnow)
<td>Belum Absen</td>
<td>Belum Absen</td>
<td>Belum Absen</td>
<td>Belum Absen</td>
<td>Belum Absen</td>
<td>Belum Absen</td>
<td>Belum Absen</td> 
<td>Belum Absen</td> 
<td>Belum Absen</td> 
<td>Belum Absen</td> 
@else
<td>Tidak Absen</td>
<td>Tidak Absen</td>
<td>Tidak Absen</td>
<td>Tidak Absen</td>
<td>Tidak Absen</td>
<td>Tidak Absen</td>
<td>Tidak Absen</td> 
<td>Tidak Absen</td> 
<td>Tidak Absen</td> 
<td>Tidak Absen</td> 
@endif  
@else
@if ($tahun."-".$bulan."-".$i == $harian[$j]->tgl)
    <td>{{ $harian[$j]->jam }}</td>
    <td><img src="{{asset('/foto/'. $harian[$j]->fotofasdes)}}"  alt="Gambar" width="80px" height="80px"></td>
    <td><img src="{{asset('/foto/'. $harian[$j]->fotokegiatanharian)}}"  alt="Gambar" width="80px" height="80px"></td>
    <td>{{ $harian[$j]->deskripsi }}</td>
    @if ($harian[$j]->jampulang == null)
    @if ($harian[$j]->tgl == $t )
    <td>Belum Absen</td>
    <td>Belum Absen</td>
    <td>Belum Absen</td> 
    <td>Belum Absen</td> 
    @else
    <td>Tidak Absen</td>
    <td>Tidak Absen</td>
    <td>Tidak Absen</td>
    <td>Tidak Absen</td>
    @endif
    @else
    <td>{{ $harian[$j]->jampulang }}</td>
    <td><img src="{{asset('/foto/'. $harian[$j]->fotofasdespulang)}}"  alt="Gambar" width="80px" height="80px"></td>
    <td><img src="{{asset('/foto/'. $harian[$j]->fotokegiatanharianpulang)}}"  alt="Gambar" width="80px" height="80px"></td>
    <td>{{ $harian[$j]->deskripsipulang }}</td>
    @endif
    <td>{{ $harian[$j]->jenis }}</td>
    <td>
        @php
        $dat = explode(":" , $harian[$j]->jam);
         $H = $dat[0] * 60;
         $hasil = $H + $dat[1];
        @endphp
        @if ($hasil > 420)
        Terlambat
        @else
        Tepat Waktu
        @endif</td>
      @php
           $j = $j+1;
         $jumlah = $jumlah - 1;
      @endphp
@else
@if ($i > $dnow)
<td>Belum Absen</td>
<td>Belum Absen</td>
<td>Belum Absen</td>
<td>Belum Absen</td>
<td>Belum Absen</td>
<td>Belum Absen</td>
<td>Belum Absen</td> 
<td>Belum Absen</td> 
<td>Belum Absen</td> 
<td>Belum Absen</td> 
@else
<td>Tidak Absen</td>
<td>Tidak Absen</td>
<td>Tidak Absen</td>
<td>Tidak Absen</td>
<td>Tidak Absen</td>
<td>Tidak Absen</td>
<td>Tidak Absen</td> 
<td>Tidak Absen</td> 
<td>Tidak Absen</td> 
<td>Tidak Absen</td> 
@endif
@endif
@endif
</tr>  
@endfor
@endfor
@endfor
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
