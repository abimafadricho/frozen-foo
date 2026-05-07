@extends('layouts.app')

@section('title', 'Dashboard - Frozeria Stok')
@section('nav_dashboard', 'active')

@section('nav_action')
  <a href="{{ route('barang.create') }}" class="btn btn-primary">+ Tambah Barang</a>
@endsection

@section('content')
<div class="page-header">
  <h1>Dashboard</h1>
  <p>Manajemen stok makanan beku Frozeria</p>
</div>

{{-- STAT CARDS --}}
<div class="stats-grid">
  <div class="stat-card">
    <div class="stat-label">Total barang</div>
    <div class="stat-value">{{ $totalBarang }}</div>
  </div>
  <div class="stat-card success">
    <div class="stat-label">Total kategori</div>
    <div class="stat-value">{{ $totalKategori }}</div>
  </div>
  <div class="stat-card warning">
    <div class="stat-label">Stok menipis</div>
    <div class="stat-value">{{ $stokMenipis }}</div>
  </div>
  <div class="stat-card danger">
    <div class="stat-label">Stok habis</div>
    <div class="stat-value">{{ $stokHabis }}</div>
  </div>
</div>

{{-- TABLE CARD --}}
<div class="card">
  {{-- TOOLBAR --}}
  <form method="GET" action="{{ route('barang.index') }}">
    <div class="toolbar">
      <div class="search-group">
        <input
          type="text"
          name="search"
          class="input-search"
          placeholder="Cari nama barang..."
          value="{{ request('search') }}"
        >
        <button type="submit" class="btn-search">Cari</button>
      </div>
      <select name="kategori" class="select-filter" onchange="this.form.submit()">
        <option value="">Semua kategori</option>
        @foreach($kategoris as $kat)
          <option value="{{ $kat->id }}" @selected(request('kategori') == $kat->id)>
            {{ $kat->nama_kategori }}
          </option>
        @endforeach
      </select>
    </div>
  </form>

  {{-- TABLE --}}
  <div class="table-wrap">
    <table>
      <thead>
        <tr>
          <th>Nama barang</th>
          <th>Kategori</th>
          <th>Stok</th>
          <th>Satuan</th>
          <th>Harga jual</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($barangs as $b)
          @php
            $stokClass = $b->jumlah_stok == 0 ? 'stok-habis' : ($b->jumlah_stok < 20 ? 'stok-tipis' : 'stok-ok');
          @endphp
          <tr>
            <td class="td-name">{{ $b->nama_barang }}</td>
            <td>
              @if($b->kategori)
                @php
                  $colors = ['badge-blue','badge-green','badge-orange','badge-purple','badge-teal'];
                  $ci = ($b->kategori_id - 1) % count($colors);
                @endphp
                <span class="badge {{ $colors[$ci] }}">{{ $b->kategori->nama_kategori }}</span>
              @else
                <span class="badge badge-gray">—</span>
              @endif
            </td>
            <td class="stok-cell {{ $stokClass }}">{{ $b->jumlah_stok }}</td>
            <td>{{ $b->satuan }}</td>
            <td>Rp {{ number_format($b->harga_jual, 0, ',', '.') }}</td>
            <td>
              <div class="action-group">
                <a href="{{ route('barang.show', $b) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                <a href="{{ route('barang.edit', $b) }}" class="btn btn-sm btn-secondary">Edit</a>
                <button
                  class="btn btn-sm btn-danger"
                  onclick="confirmDelete({{ $b->id }}, '{{ addslashes($b->nama_barang) }}')"
                >Hapus</button>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6">
              <div class="empty-state">
                <div class="empty-state-icon">📦</div>
                <p>Tidak ada barang ditemukan.</p>
              </div>
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  {{-- FOOTER --}}
  <div class="table-footer">
    <span class="table-info">
      Menampilkan {{ $barangs->firstItem() ?? 0 }}–{{ $barangs->lastItem() ?? 0 }}
      dari {{ $barangs->total() }} barang
    </span>
    <div class="pagination">
      {{-- Prev --}}
      @if($barangs->onFirstPage())
        <span class="disabled">‹ Prev</span>
      @else
        <a href="{{ $barangs->previousPageUrl() }}">‹ Prev</a>
      @endif

      {{-- Pages --}}
      @foreach(range(1, $barangs->lastPage()) as $page)
        @if($page == $barangs->currentPage())
          <span class="active">{{ $page }}</span>
        @else
          <a href="{{ $barangs->url($page) }}">{{ $page }}</a>
        @endif
      @endforeach

      {{-- Next --}}
      @if($barangs->hasMorePages())
        <a href="{{ $barangs->nextPageUrl() }}">Next ›</a>
      @else
        <span class="disabled">Next ›</span>
      @endif
    </div>
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