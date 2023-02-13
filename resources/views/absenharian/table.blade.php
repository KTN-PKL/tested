
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
        <th>Jam Pulang</th>
        <th>Foto Fasdes Pulang</th>
        <th>Foto Kegiatan Pulang</th>
        <th>Jenis</th>
        <th>status</th>
        <th>Action</th>
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
@else
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
    @if ($harian[$j]->jampulang == null)
    @if ($harian[$j]->tgl == $t )
    <td>Belum Absen</td>
    <td>Belum Absen</td>
    <td>Belum Absen</td> 
    @else
    <td>Tidak Absen</td>
    <td>Tidak Absen</td>
    <td>Tidak Absen</td>
    @endif
    @else
    <td>{{ $harian[$j]->jampulang }}</td>
    <td><img src="{{asset('/foto/'. $harian[$j]->fotofasdespulang)}}"  alt="Gambar" width="80px" height="80px"></td>
    <td><img src="{{asset('/foto/'. $harian[$j]->fotokegiatanharianpulang)}}"  alt="Gambar" width="80px" height="80px"></td>
    @endif
    <td>{{ $harian[$j]->jenis }}</td>
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
      <td><a href="{{ route('faskab.harian.edit', $harian[$j]->id_absenharian) }}" class="btn btn-primary btn-sm">Edit</a></td>
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
@else
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
