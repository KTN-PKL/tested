
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
        <th>status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
@for ($i = 1; $i <= $hari; $i++)
@php
            $now = strtotime($i."-".$bulan."-".$tahun);
            $d = date("D", $now);
@endphp
{{-- @if ($d <> "Sat" && $d <> "Sun") --}}
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
    <td><img src="{{asset('/foto/'. $harian[$j]->fotofasdes)}}"  alt="Gambar" width="80px" height="80px"></td>
    <td><img src="{{asset('/foto/'. $harian[$j]->fotokegiatanharian)}}"  alt="Gambar" width="80px" height="80px"></td>
    @if ($harian[$j]->jampulang == null)
    @if ($harian[$j]->tgl == $dayList[$d].", ".$t )
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
  {{-- @endif --}}
@endfor
</tbody>
</table>
