@extends('layouts.app')

@section('title', $barang->nama_barang . ' - Detail Barang')
@section('nav_dashboard', 'active')

@section('nav_action')
  <a href="{{ route('barang.edit', $barang) }}" class="btn btn-secondary">Edit Barang</a>
  <button class="btn btn-danger" onclick="confirmDelete({{ $barang->id }}, '{{ addslashes($barang->nama_barang) }}')">Hapus</button>
@endsection

@section('content')
<div class="breadcrumb">
  <a href="{{ route('barang.index') }}">Dashboard</a>
  <span class="breadcrumb-sep">›</span>
  <span>Detail Barang</span>
</div>

<div class="page-header-row">
  <div>
    <a href="{{ route('barang.index') }}" class="back-link">← Kembali</a>
    <h1 style="margin-top:4px">Detail Barang</h1>
  </div>
</div>

<div class="card">
  {{-- Header: foto + nama --}}
  <div class="detail-header">
    <div class="detail-foto">
      @if($barang->foto)
        <img src="{{ asset('storage/' . $barang->foto) }}" alt="{{ $barang->nama_barang }}">
      @else
        🖼️
      @endif
    </div>
    <div>
      <div class="detail-name">{{ $barang->nama_barang }}</div>
      @if($barang->kategori)
        @php
          $colors = ['badge-blue','badge-green','badge-orange','badge-purple','badge-teal'];
          $ci = ($barang->kategori_id - 1) % count($colors);
        @endphp
        <span class="badge {{ $colors[$ci] }}">{{ $barang->kategori->nama_kategori }}</span>
      @else
        <span class="badge badge-gray">Tanpa kategori</span>
      @endif
    </div>
  </div>

  {{-- Detail grid --}}
  <div class="detail-grid">
    <div class="detail-item">
      <div class="detail-item-label">Jumlah stok</div>
      @php
        $sc = $barang->jumlah_stok == 0 ? 'stok-habis' : ($barang->jumlah_stok < 20 ? 'stok-tipis' : 'stok-ok');
      @endphp
      <div class="detail-item-value {{ $sc }}">{{ $barang->jumlah_stok }} {{ $barang->satuan }}</div>
    </div>
    <div class="detail-item">
      <div class="detail-item-label">Stok minimum</div>
      <div class="detail-item-value">{{ $barang->stok_minimum ?? '—' }} {{ $barang->stok_minimum ? $barang->satuan : '' }}</div>
    </div>
    <div class="detail-item">
      <div class="detail-item-label">Harga jual</div>
      <div class="detail-item-value">Rp {{ number_format($barang->harga_jual, 0, ',', '.') }}</div>
    </div>
    <div class="detail-item">
      <div class="detail-item-label">Harga beli</div>
      <div class="detail-item-value">Rp {{ number_format($barang->harga_beli, 0, ',', '.') }}</div>
    </div>
    <div class="detail-item">
      <div class="detail-item-label">Berat / ukuran</div>
      <div class="detail-item-value">{{ $barang->berat_ukuran ?? '—' }}</div>
    </div>
    <div class="detail-item">
      <div class="detail-item-label">Lokasi simpan</div>
      <div class="detail-item-value">{{ $barang->lokasi_simpan ?? '—' }}</div>
    </div>
  </div>

  @if($barang->deskripsi)
  <div class="detail-desc">
    <div class="detail-desc-label">Deskripsi</div>
    <div class="detail-desc-text">{{ $barang->deskripsi }}</div>
  </div>
  @endif

  <div style="padding: 16px; border-top: 1px solid var(--gray-100); display:flex; gap:10px; justify-content:flex-end;">
    <a href="{{ route('barang.edit', $barang) }}" class="btn btn-secondary">✏️ Edit Barang</a>
    <button class="btn btn-danger" onclick="confirmDelete({{ $barang->id }}, '{{ addslashes($barang->nama_barang) }}')">🗑️ Hapus</button>
  </div>
</div>

{{-- MODAL HAPUS --}}
<div class="modal-overlay" id="modalHapus">
  <div class="modal-box">
    <div class="modal-icon">⚠️</div>
    <h3 class="modal-title">Hapus barang?</h3>
    <p class="modal-desc" id="modalDesc"></p>
    <div class="modal-actions">
      <button class="btn btn-secondary" onclick="closeModal()">Batal</button>
      <form id="deleteForm" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  function confirmDelete(id, name) {
    document.getElementById('modalDesc').innerHTML =
      'Data <strong>' + name + '</strong> akan dihapus secara permanen dari sistem. Tindakan ini tidak dapat dibatalkan.';
    document.getElementById('deleteForm').action = '/barang/' + id;
    document.getElementById('modalHapus').classList.add('active');
  }
  function closeModal() {
    document.getElementById('modalHapus').classList.remove('active');
  }
  document.getElementById('modalHapus').addEventListener('click', function(e) {
    if (e.target === this) closeModal();
  });
</script>
@endsection