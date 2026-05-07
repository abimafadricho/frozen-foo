@extends('layouts.app')

@section('title', 'Edit Kategori - ' . $kategori->nama_kategori)
@section('nav_kategori', 'active')

@section('content')
<div class="breadcrumb">
  <a href="{{ route('kategori.index') }}">Kategori</a>
  <span class="breadcrumb-sep">›</span>
  <span>Edit Kategori</span>
</div>

<div class="page-header-row">
  <div>
    <a href="{{ route('kategori.index') }}" class="back-link">← Kembali</a>
    <h1 style="margin-top:4px">Edit Kategori</h1>
  </div>
</div>

<div class="card" style="max-width:520px;">
  <form action="{{ route('kategori.update', $kategori) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group" style="margin-bottom:16px;">
      <label>Nama kategori <span class="req">*</span></label>
      <input type="text" name="nama_kategori"
        class="form-control @error('nama_kategori') is-invalid @enderror"
        value="{{ old('nama_kategori', $kategori->nama_kategori) }}">
      @error('nama_kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="form-group" style="margin-bottom:24px;">
      <label>Deskripsi (opsional)</label>
      <textarea name="deskripsi"
        class="form-control @error('deskripsi') is-invalid @enderror"
        placeholder="Deskripsi kategori...">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
      @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="form-actions">
      <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Batal</a>
      <button type="submit" class="btn btn-primary">💾 Simpan Perubahan</button>
    </div>
  </form>
</div>
@endsection