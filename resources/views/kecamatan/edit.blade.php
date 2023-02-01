<form class="row g-3" action="{{route('faskab.kecamatan.update', $kecamatan->id_kecamatan)}}" method="POST">
    @csrf
    <div class="col-12">
      <label for="inputNanme4" class="form-label">Kecamatan</label>
      <input type="text" class="form-control" name="kecamatan" value="{{ $kecamatan->kecamatan }}">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form><!-- Vertical Form -->