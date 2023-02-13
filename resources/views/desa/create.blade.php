<form class="row g-3" action="{{route('faskab.desa.store')}}" method="POST" aria-required="true">
    @csrf
    <div class="col-12">
      <label for="inputNanme4" class="form-label">Kecamatan</label>
      <select style="background-color: rgb(255, 255, 255)" class="form-select form-select-sm" aria-label=".form-select-sm example" name="id_kecamatan" required>
        <option  selected disabled>--Pilih Kecamatan--</option>
        @foreach ($kecamatan as $kecamatans)
        <option value="{{ $kecamatans->id_kecamatan }}">{{ $kecamatans->kecamatan }}</option>
        @endforeach
     </select>
    </div>
    <div class="col-12">
      <label for="inputNanme4" class="form-label">Desa</label>
      <input type="text" class="form-control" name="desa" required>
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form><!-- Vertical Form -->