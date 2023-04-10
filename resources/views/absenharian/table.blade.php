<link rel="stylesheet" href="{{ config('sweetalert.animatecss') }}">
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
        {{-- <th>Foto Kegiatan Masuk</th> --}}
        <th>Jenis</th>
        <th>Jam Pulang</th>
        <th>Foto Fasdes Pulang</th>
        {{-- <th>Foto Kegiatan Pulang</th> --}}
        <th>Jenis Pulang</th>
        <th>Status</th>
        <th>Verifikasi</th>
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
@php
$cek2 = strlen($i);
    if($cek2 <> 2)
    {$i = "0".$i;}
    $cek3 = strlen($bulan);
    if($cek3 <> 2)
    {$bulan = "0".$bulan;}
@endphp
<tr>
    <td>{{$dayList[$d].", ".$i."-".$bulan."-".$tahun}}</td>

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
{{-- <td>Belum Absen</td> 
<td>Belum Absen</td> --}}
@else
<td>Tidak Absen</td>
<td>Tidak Absen</td>
<td>Tidak Absen</td>
<td>Tidak Absen</td>
<td>Tidak Absen</td>
<td>Tidak Absen</td>
<td>Tidak Absen</td> 
<td>Tidak Absen</td> 
{{-- <td>Tidak Absen</td>
<td>Tidak Absen</td> --}}
@endif  
@else
@if ($tahun."-".$bulan."-".$i == $harian[$j]->tgl)
    <td>{{ $harian[$j]->jam }}</td>
    <td><img src="{{asset('/foto/'. $harian[$j]->fotofasdes)}}"  alt="Gambar" width="80px" height="80px"></td>
    {{-- <td><img src="{{asset('/foto/'. $harian[$j]->fotokegiatanharian)}}"  alt="Gambar" width="80px" height="80px"></td> --}}
    <td>{{ $harian[$j]->jenis }}</td>
    @if ($harian[$j]->jampulang == null)
    @if ($harian[$j]->tgl == $t )
    <td>Belum Absen</td>
    <td>Belum Absen</td>
    {{-- <td>Belum Absen</td>  --}}
    <td>Belum Absen</td> 
    @else
    <td>Tidak Absen</td>
    <td>Tidak Absen</td>
    {{-- <td>Tidak Absen</td> --}}
    <td>Tidak Absen</td>
    @endif
    @else
    <td>{{ $harian[$j]->jampulang }}</td>
    <td><img src="{{asset('/foto/'. $harian[$j]->fotofasdespulang)}}"  alt="Gambar" width="80px" height="80px"></td>
    {{-- <td><img src="{{asset('/foto/'. $harian[$j]->fotokegiatanharianpulang)}}"  alt="Gambar" width="80px" height="80px"></td> --}}
    <td>{{ $harian[$j]->jenispulang }}</td>
    @endif
   
    <td>
        @php
        $dat = explode(":" , $harian[$j]->jam);
         $H = $dat[0] * 60;
         $hasil = $H + $dat[1];
        @endphp
        @if ($hasil > 480)
        Terlambat
        @else
        Tepat Waktu
        @endif</td>
        <td>
          @if($harian[$j]->verifikasi == "Verified")
          <span class="badge bg-success">Verified</span>
          @elseif($harian[$j]->verifikasi == "Decline")
          <span class="badge bg-danger">Decline</span>
          @else
          <span class="badge bg-danger">No Status</span>
          @endif
        </td>
      <td>
        <a href="{{ route('faskab.harian.edit', $harian[$j]->id_absenharian) }}" class="btn btn-warning btn-sm">Edit</a>
        <a href="{{ route('faskab.harian.detail', $harian[$j]->id_absenharian) }}" class="btn btn-primary btn-sm">Detail</a>
        {{-- <a href="{{route('absen.harian.verified', $harian[$j]->id_absenharian)}}" class="btn btn-success btn-sm">Verified</a> --}}
        @if ($harian[$j]->verifikasi == "Verified")
        <a onclick="hapus()" href="#" class="btn btn-danger btn-sm">Decline</a>
        <a href="{{route('absen.harian.decline', $harian[$j]->id_absenharian)}}" id="decline"></a>
        @endif
      </td>
     
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
{{-- <td>Belum Absen</td> 
<td>Belum Absen</td>  --}}
@else
<td>Tidak Absen</td>
<td>Tidak Absen</td>
<td>Tidak Absen</td>
<td>Tidak Absen</td>
<td>Tidak Absen</td>
<td>Tidak Absen</td>
<td>Tidak Absen</td> 
<td>Tidak Absen</td> 
{{-- <td>Tidak Absen</td> 
<td>Tidak Absen</td>  --}}
@endif
@endif
@endif
</tr>  
@endfor
@endfor
@endfor
</tbody>
</table>

<script src="{{ $cdn ?? asset('vendor/sweetalert/sweetalert.all.js')  }}"></script>
<script>
   function hapus() {
            Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Decline Absen ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Iya Saya Yakin!',
            cancelButtonText: 'Tidak'
            }).then((result) => {
            if (result.value) {
              document.getElementById("decline").click();}
                })
        }
</script>
