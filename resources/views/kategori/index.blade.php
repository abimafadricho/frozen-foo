@extends('layouts.app')

@section('title', 'Kategori - Frozeria Stok')
@section('nav_kategori', 'active')

@section('nav_action')
  <a href="{{ route('kategori.create') }}" class="btn btn-primary">+ Tambah Kategori</a>
@endsection

@section('content')
<div class="page-header">
  <h1>Daftar Kategori</h1>
  <p>Kelola kategori makanan beku toko Frozeria</p>
</div>

<div class="card">
  {{-- Search --}}
  <form method="GET" action="{{ route('kategori.index') }}" style="margin-bottom:16px;">
    <div class="search-group" style="max-width:360px;">
      <input type="text" name="search" class="input-search"
        placeholder="Cari kategori..." value="{{ request('search') }}">
      <button type="submit" class="btn-search">Cari</button>
    </div>
  </form>

  <div class="table-wrap">
    <table>
      <thead>
        <tr>
          <th>Nama kategori</th>
          <th>Jumlah barang</th>
          <th>Dibuat</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($kategoris as $kat)
          <tr>
            <td class="td-name">{{ $kat->nama_kategori }}</td>
            <td>{{ $kat->barangs_count }} barang</td>
            <td>{{ $kat->created_at->format('j M Y') }}</td>
            <td>
              <div class="action-group">
                <a href="{{ route('kategori.edit', $kat) }}" class="btn btn-sm btn-secondary">Edit</a>
                <button class="btn btn-sm btn-danger"
                  onclick="confirmDelete({{ $kat->id }}, '{{ addslashes($kat->nama_kategori) }}')">
                  Hapus
                </button>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="4">
              <div class="empty-state">
                <div class="empty-state-icon">🏷️</div>
                <p>Belum ada kategori. <a href="{{ route('kategori.create') }}">Tambah sekarang</a></p>
              </div>
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div style="margin-top:14px; font-size:13px; color:var(--gray-500);">
    {{ $kategoris->count() }} kategori terdaftar
  </div>
</div>

{{-- MODAL HAPUS --}}
<div class="modal-overlay" id="modalHapus">
  <div class="modal-box">
    <div class="modal-icon">⚠️</div>
    <h3 class="modal-title">Hapus kategori?</h3>
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
      'Kategori <strong>' + name + '</strong> akan dihapus. Barang yang terkait tidak akan terhapus, namun akan menjadi tidak berkategori.';
    document.getElementById('deleteForm').action = '/kategori/' + id;
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