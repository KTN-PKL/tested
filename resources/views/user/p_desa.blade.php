<div class="col-12">
  <label for="inputEmail4" class="form-label">Desa</label>
  <select class="form-select" name="id_desa" id="id_desa" onchange="getId()">
    <option @if ($lokasi->id_desa == null)
      selected
    @endif disabled>-- Pilih Desa --</option>
    @foreach ($desa as $item)
    <option value="{{ $item->id_desa }}" @if ($lokasi->id_desa == $item->id_desa)
      selected
    @endif>{{ $item->desa }}</option>
    @endforeach
  </select>
</div>

<script>
   
</script>