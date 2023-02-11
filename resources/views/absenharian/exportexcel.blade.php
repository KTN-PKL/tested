<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css" />
    <script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> 
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>  
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>



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
 
	<?php
	//header("Content-type: application/vnd-ms-word");
	//header("Content-Disposition: attachment; filename=absenharian.pdf");
	?>
 
	<center>
		<h1>Absen Harian</h1>
	</center>
 
	@php
date_default_timezone_set("Asia/Jakarta");
$gnow = strtotime($bulans);
$kalender = CAL_GREGORIAN;
$bulan = date('m', $gnow);
$tahun = date('Y', $gnow);
$bnow = date('m');
$tnow = date('Y');
$hari = cal_days_in_month($kalender, $bulan, $tahun);
$t = date("Y-m-d");
          $dayList = array(
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            );
$j = 0;
$dnow = date("j");
@endphp
<table border="1">
    <thead>
      <tr>
        <th>Tanggal</th>
        <th>Jam Masuk</th>
        <th>Foto Fasdes Masuk</th>
        <th>Foto Kegiatan Masuk</th>
        <th>Jam Pulang</th>
        <th>Foto Fasdes Pulang</th>
        <th>Foto Kegiatan Pulang</th>
        <th>status</th>
      </tr>
    </thead>
    <tbody>
@for ($i = 1; $i <= $hari; $i++)
@php
            $now = strtotime($i."-".$bulan."-".$tahun);
            $d = date("D", $now);
@endphp
@if ($d <> "Sat" && $d <> "Sun")
<tr>
    <td style="width:10%">{{$dayList[$d].", ".$i."-".$bulan."-".$tahun}}</td>
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
@else
<td>Tidak Absen</td>
<td>Tidak Absen</td>
<td>Tidak Absen</td>
<td>Tidak Absen</td>
<td>Tidak Absen</td>
<td>Tidak Absen</td>
<td>Tidak Absen</td> 
@endif  
@else
@if ($dayList[$d].", ".$tahun."-".$bulan."-".$i == $harian[$j]->tgl)
    <td>{{ $harian[$j]->jam }}</td>
    <td><img src="{{asset('/foto/'. $harian[$j]->fotofasdes)}}"  alt="Gambar" width="50" height="50"></td>
    <td><img src="{{asset('/foto/'. $harian[$j]->fotokegiatanharian)}}"  alt="Gambar" width="50" height="50"></td>
    <td>{{ $harian[$j]->jampulang }}</td>
    <td><img src="{{asset('/foto/'. $harian[$j]->fotofasdespulang)}}"  alt="Gambar" width="50" height="50"></td>
    <td><img src="{{asset('/foto/'. $harian[$j]->fotokegiatanharianpulang)}}"  alt="Gambar" width="50" height="50"></td>
    <td>
        @php
        $dat = explode(":" , $harian[$j]->jam);
         $H = $dat[$j] * 60;
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
@else
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
  @endif
@endfor
</tbody>
</table>
<script>
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
</body>
</html>