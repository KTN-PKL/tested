<div class="col-12">
    <label for="inputEmail4" class="form-label">Desa</label>
    <select class="form-select" name="id_desa" required>
      <option disabled>-- Pilih Desa --</option>
      @foreach ($desa as $item)
      <option value="{{ $item->id_desa }}">{{ $item->desa }}</option>
      @endforeach
    </select>
</div>