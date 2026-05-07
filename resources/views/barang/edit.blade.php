@extends('layouts.app')

@section('title', 'Edit Barang - ' . $barang->nama_barang)
@section('nav_dashboard', 'active')

@section('content')
<div class="breadcrumb">
  <a href="{{ route('barang.index') }}">Dashboard</a>
  <span class="breadcrumb-sep">›</span>
  <a href="{{ route('barang.show', $barang) }}">{{ $barang->nama_barang }}</a>
  <span class="breadcrumb-sep">›</span>
  <span>Edit</span>
</div>

<div class="page-header-row">
  <div>
    <a href="{{ route('barang.show', $barang) }}" class="back-link">← Kembali</a>
    <h1 style="margin-top:4px">Edit Barang</h1>
  </div>
</div>

<div class="card">
  <form action="{{ route('barang.update', $barang) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- FOTO UPLOAD --}}
    <div style="margin-bottom:24px; padding-bottom:20px; border-bottom:1px solid var(--gray-100);">
      <span class="label-foto">Foto barang</span>
      <div class="foto-upload-area" id="dropArea" onclick="document.getElementById('fotoInput').click()">
        <div id="previewContainer" style="{{ $barang->foto ? '' : 'display:none;' }}">
          <img id="fotoPreview" class="foto-preview"
            src="{{ $barang->foto ? asset('storage/' . $barang->foto) : '' }}"
            alt="Preview">
        </div>
        <div id="uploadPlaceholder" style="{{ $barang->foto ? 'display:none;' : '' }}">
          <div class="foto-upload-icon">🖼️</div>
          <div class="foto-upload-text">Klik untuk memilih foto, atau seret file ke sini</div>
          <div class="foto-upload-hint">Format: JPG, PNG — Maks. 2 MB</div>
        </div>
        <button type="button" class="btn btn-secondary btn-sm" style="margin-top:10px"
          onclick="event.stopPropagation(); document.getElementById('fotoInput').click()">
          {{ $barang->foto ? 'Ganti Foto' : 'Pilih Foto' }}
        </button>
      </div>
      <input type="file" name="foto" id="fotoInput" accept="image/jpg,image/jpeg,image/png">
      @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    {{-- FORM FIELDS --}}
    <div class="form-grid">
      <div class="form-group full">
        <label>Nama barang <span class="req">*</span></label>
        <input type="text" name="nama_barang"
          class="form-control @error('nama_barang') is-invalid @enderror"
          value="{{ old('nama_barang', $barang->nama_barang) }}">
        @error('nama_barang') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="form-group">
        <label>Kategori</label>
        <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
          <option value="">Pilih kategori</option>
          @foreach($kategoris as $kat)
            <option value="{{ $kat->id }}"
              @selected(old('kategori_id', $barang->kategori_id) == $kat->id)>
              {{ $kat->nama_kategori }}
            </option>
          @endforeach
        </select>
        @error('kategori_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="form-group">
        <label>Satuan <span class="req">*</span></label>
        <input type="text" name="satuan"
          class="form-control @error('satuan') is-invalid @enderror"
          value="{{ old('satuan', $barang->satuan) }}">
        @error('satuan') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="form-group">
        <label>Jumlah stok <span class="req">*</span></label>
        <input type="number" name="jumlah_stok"
          class="form-control @error('jumlah_stok') is-invalid @enderror"
          value="{{ old('jumlah_stok', $barang->jumlah_stok) }}" min="0">
        @error('jumlah_stok') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="form-group">
        <label>Stok minimum</label>
        <input type="number" name="stok_minimum"
          class="form-control @error('stok_minimum') is-invalid @enderror"
          value="{{ old('stok_minimum', $barang->stok_minimum) }}" min="0">
        @error('stok_minimum') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="form-group">
        <label>Harga jual (Rp)</label>
        <input type="number" name="harga_jual"
          class="form-control @error('harga_jual') is-invalid @enderror"
          value="{{ old('harga_jual', $barang->harga_jual) }}" min="0">
        @error('harga_jual') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="form-group">
        <label>Harga beli (Rp)</label>
        <input type="number" name="harga_beli"
          class="form-control @error('harga_beli') is-invalid @enderror"
          value="{{ old('harga_beli', $barang->harga_beli) }}" min="0">
        @error('harga_beli') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="form-group">
        <label>Berat / ukuran</label>
        <input type="text" name="berat_ukuran"
          class="form-control @error('berat_ukuran') is-invalid @enderror"
          value="{{ old('berat_ukuran', $barang->berat_ukuran) }}" placeholder="500 gram">
        @error('berat_ukuran') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="form-group">
        <label>Lokasi simpan</label>
        <input type="text" name="lokasi_simpan"
          class="form-control @error('lokasi_simpan') is-invalid @enderror"
          value="{{ old('lokasi_simpan', $barang->lokasi_simpan) }}" placeholder="Rak A-3">
        @error('lokasi_simpan') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="form-group full">
        <label>Deskripsi</label>
        <textarea name="deskripsi"
          class="form-control @error('deskripsi') is-invalid @enderror"
          placeholder="Deskripsi singkat barang...">{{ old('deskripsi', $barang->deskripsi) }}</textarea>
        @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>
    </div>

    <div class="form-actions" style="margin-top:20px; padding-top:16px; border-top:1px solid var(--gray-100);">
      <a href="{{ route('barang.show', $barang) }}" class="btn btn-secondary">Batal</a>
      <button type="submit" class="btn btn-primary">💾 Simpan Perubahan</button>
    </div>
  </form>
</div>
@endsection

@section('scripts')
<script>
  const fotoInput = document.getElementById('fotoInput');
  const fotoPreview = document.getElementById('fotoPreview');
  const previewContainer = document.getElementById('previewContainer');
  const uploadPlaceholder = document.getElementById('uploadPlaceholder');

  fotoInput.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = e => {
        fotoPreview.src = e.target.result;
        previewContainer.style.display = 'block';
        uploadPlaceholder.style.display = 'none';
      };
      reader.readAsDataURL(file);
    }
  });

  const dropArea = document.getElementById('dropArea');
  dropArea.addEventListener('dragover', e => { e.preventDefault(); dropArea.style.borderColor = 'var(--brand)'; });
  dropArea.addEventListener('dragleave', () => { dropArea.style.borderColor = ''; });
  dropArea.addEventListener('drop', e => {
    e.preventDefault();
    dropArea.style.borderColor = '';
    const file = e.dataTransfer.files[0];
    if (file && file.type.startsWith('image/')) {
      const dt = new DataTransfer();
      dt.items.add(file);
      fotoInput.files = dt.files;
      fotoInput.dispatchEvent(new Event('change'));
    }
  });
</script>
@endsection