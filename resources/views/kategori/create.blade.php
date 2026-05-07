@extends('layouts.app')

@section('title', 'Tambah Kategori - Frozeria Stok')
@section('nav_kategori', 'active')

@section('content')
<div class="breadcrumb">
  <a href="{{ route('kategori.index') }}">Kategori</a>
  <span class="breadcrumb-sep">›</span>
  <span>Tambah Kategori</span>
</div>

<div class="page-header-row">
  <div>
    <a href="{{ route('kategori.index') }}" class="back-link">← Kembali</a>
    <h1 style="margin-top:4px">Tambah Kategori</h1>
  </div>
</div>

<div class="card" style="max-width:520px;">
  <form action="{{ route('kategori.store') }}" method="POST">
    @csrf
    <div class="form-group" style="margin-bottom:16px;">
      <label>Nama kategori <span class="req">*</span></label>
      <input type="text" name="nama_kategori"
        class="form-control @error('nama_kategori') is-invalid @enderror"
        value="{{ old('nama_kategori') }}"
        placeholder="Contoh: Ayam">
      @error('nama_kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="form-group" style="margin-bottom:24px;">
      <label>Deskripsi (opsional)</label>
      <textarea name="deskripsi"
        class="form-control @error('deskripsi') is-invalid @enderror"
        placeholder="Produk berbahan dasar ayam beku...">{{ old('deskripsi') }}</textarea>
      @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="form-actions">
      <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Batal</a>
      <button type="submit" class="btn btn-primary">💾 Simpan Kategori</button>
    </div>
  </form>
</div>
@endsection