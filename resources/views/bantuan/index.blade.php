@extends('layouts.app')

@section('title', 'Bantuan - Frozeria Stok')
@section('nav_bantuan', 'active')

@section('content')
<div class="page-header">
  <h1>Panduan Penggunaan Sistem</h1>
  <p>Petunjuk penggunaan aplikasi stok opname Frozeria</p>
</div>

<div class="card" style="max-width:720px;">

  {{-- Cara menambah barang baru --}}
  <div class="help-section">
    <div class="help-section-title">📦 Cara menambah barang baru</div>
    <ul class="help-steps">
      <li>
        <span class="help-step-num">1</span>
        <p>Buka halaman <strong>Dashboard</strong>, klik tombol <strong>+ Tambah Barang</strong> di kanan atas.</p>
      </li>
      <li>
        <span class="help-step-num">2</span>
        <p>Unggah foto barang (opsional), lalu isi formulir: nama, kategori, satuan, jumlah stok, harga, dan lainnya.</p>
      </li>
      <li>
        <span class="help-step-num">3</span>
        <p>Klik <strong>Simpan Barang</strong>. Barang akan muncul di daftar dashboard.</p>
      </li>
    </ul>
  </div>

  {{-- Cara update stok --}}
  <div class="help-section">
    <div class="help-section-title">🔄 Cara update stok barang masuk</div>
    <ul class="help-steps">
      <li>
        <span class="help-step-num">1</span>
        <p>Temukan barang di dashboard menggunakan kolom pencarian atau filter kategori.</p>
      </li>
      <li>
        <span class="help-step-num">2</span>
        <p>Klik tombol <strong>Edit</strong> pada baris barang tersebut.</p>
      </li>
      <li>
        <span class="help-step-num">3</span>
        <p>Ubah nilai <strong>Jumlah stok</strong> sesuai kondisi saat ini, lalu klik <strong>Simpan Perubahan</strong>.</p>
      </li>
    </ul>
  </div>

  {{-- Cara mengelola kategori --}}
  <div class="help-section">
    <div class="help-section-title">🏷️ Cara mengelola kategori</div>
    <ul class="help-steps">
      <li>
        <span class="help-step-num">1</span>
        <p>Buka halaman <strong>Kategori</strong> dari navigasi atas.</p>
      </li>
      <li>
        <span class="help-step-num">2</span>
        <p>Tambah, edit, atau hapus kategori sesuai kebutuhan toko.</p>
      </li>
      <li>
        <span class="help-step-num">3</span>
        <p>Menghapus kategori <strong>tidak</strong> akan menghapus barang — barang akan menjadi tidak berkategori.</p>
      </li>
    </ul>
  </div>

  {{-- Info tambahan --}}
  <div class="help-section">
    <div class="help-section-title">ℹ️ Informasi tambahan</div>
    <div class="help-note">
      <span>ℹ️</span>
      <span>Satuan barang diisi bebas sesuai kebutuhan — misalnya: <strong>pcs</strong>, <strong>pack</strong>, <strong>box</strong>, <strong>kg</strong>, <strong>liter</strong>, dan lain-lain.</span>
    </div>
    <div class="help-note" style="margin-top:8px;">
      <span>⚠️</span>
      <span>Card <strong>Stok Menipis</strong> menampilkan barang dengan stok antara 1–19. Card <strong>Stok Habis</strong> menampilkan barang dengan stok 0.</span>
    </div>
  </div>

  {{-- Developer info --}}
  <div style="margin-top:8px;">
    <div class="developer-card">
      <h3>👤 Informasi Developer</h3>
      <div class="developer-info">
        <div class="dev-item">
          <span>Nama</span><span>: Abima Fadricho Syuhadak</span>
        </div>
        <div class="dev-item">
          <span>NIM</span><span>: 2241720025</span>
        </div>
        <div class="dev-item">
          <span>Kelas</span><span>: TI-4F</span>
        </div>
        <div class="dev-item">
          <span>Telepon</span><span>: 081357706168</span>
        </div>
        <div class="dev-item">
          <span>Alamat</span><span>: Malang</span>
        </div>
        <div class="dev-item">
          <span>Email</span><span>: abimafadricho.29@gmail.com</span>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection