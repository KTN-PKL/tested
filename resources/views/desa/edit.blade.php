<form class="row g-3" action="{{route('faskab.desa.update', $desa->id_desa)}}" method="POST">
    @csrf
    <div class="col-12">
      <label for="inputNanme4" class="form-label">Kecamatan</label>
      <select style="background-color: rgb(212, 211, 211)" class="form-select form-select-sm" aria-label=".form-select-sm example" name="id_kecamatan" required>
        @foreach ($kecamatan as $kecamatans)
        <option value="{{ $kecamatans->id_kecamatan }}"
          @if ($kecamatans->id_kecamatan == $desa->id_kecamatan)
              selected
          @endif
          >{{ $kecamatans->kecamatan }}</option>
        @endforeach
     </select>
    </div>
    <div class="col-12">
      <label for="inputNanme4" class="form-label">Desa</label>
      <input type="text" class="form-control" name="desa" value="{{ $desa->desa }}">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form><!-- Vertical Form -->