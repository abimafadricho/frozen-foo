<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Frozeria Stok')</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>
  /* ===== RESET & BASE ===== */
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  :root {
    --brand:    #1e6fcf;
    --brand-dk: #154fa0;
    --brand-lt: #e8f1fc;
    --accent:   #0ea5e9;
    --success:  #16a34a;
    --warning:  #d97706;
    --danger:   #dc2626;
    --gray-50:  #f8fafc;
    --gray-100: #f1f5f9;
    --gray-200: #e2e8f0;
    --gray-300: #cbd5e1;
    --gray-400: #94a3b8;
    --gray-500: #64748b;
    --gray-600: #475569;
    --gray-700: #334155;
    --gray-800: #1e293b;
    --gray-900: #0f172a;
    --white:    #ffffff;
    --radius:   8px;
    --shadow-sm: 0 1px 3px rgba(0,0,0,.08), 0 1px 2px rgba(0,0,0,.05);
    --shadow:    0 4px 12px rgba(0,0,0,.08), 0 2px 4px rgba(0,0,0,.05);
    --shadow-lg: 0 10px 30px rgba(0,0,0,.12);
  }
  body {
    font-family: 'Plus Jakarta Sans', sans-serif;
    background: var(--gray-50);
    color: var(--gray-800);
    font-size: 14px;
    line-height: 1.6;
    min-height: 100vh;
  }

  /* ===== NAVBAR ===== */
  .navbar {
    background: var(--white);
    border-bottom: 1px solid var(--gray-200);
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 0 24px;
    height: 56px;
    position: sticky;
    top: 0;
    z-index: 100;
    box-shadow: var(--shadow-sm);
  }
  .nav-brand {
    font-size: 17px;
    font-weight: 800;
    color: var(--brand);
    letter-spacing: -0.3px;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 6px;
    margin-right: 8px;
  }
  .nav-brand span { color: var(--gray-400); font-weight: 300; font-size: 15px; }
  .nav-divider { width: 1px; height: 20px; background: var(--gray-200); margin: 0 4px; }
  .nav-link {
    padding: 6px 14px;
    border-radius: 6px;
    text-decoration: none;
    color: var(--gray-600);
    font-weight: 500;
    font-size: 13.5px;
    transition: all .15s;
  }
  .nav-link:hover { background: var(--gray-100); color: var(--gray-800); }
  .nav-link.active { background: var(--brand-lt); color: var(--brand); font-weight: 600; }
  .nav-spacer { flex: 1; }

  /* ===== BUTTONS ===== */
  .btn {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 7px 16px; border-radius: var(--radius);
    font-size: 13.5px; font-weight: 600; font-family: inherit;
    cursor: pointer; border: none; transition: all .15s; text-decoration: none;
    white-space: nowrap;
  }
  .btn-primary { background: var(--brand); color: var(--white); }
  .btn-primary:hover { background: var(--brand-dk); }
  .btn-secondary { background: var(--white); color: var(--gray-700); border: 1px solid var(--gray-300); }
  .btn-secondary:hover { background: var(--gray-50); border-color: var(--gray-400); }
  .btn-danger { background: var(--danger); color: var(--white); }
  .btn-danger:hover { background: #b91c1c; }
  .btn-warning { background: var(--warning); color: var(--white); }
  .btn-warning:hover { background: #b45309; }
  .btn-success { background: var(--success); color: var(--white); }
  .btn-success:hover { background: #15803d; }
  .btn-sm { padding: 4px 11px; font-size: 12.5px; }
  .btn-outline-primary { background: transparent; color: var(--brand); border: 1px solid var(--brand); }
  .btn-outline-primary:hover { background: var(--brand-lt); }

  /* ===== CONTAINER ===== */
  .container { max-width: 1180px; margin: 0 auto; padding: 28px 24px; }
  .page-header { margin-bottom: 24px; }
  .page-header h1 { font-size: 22px; font-weight: 800; color: var(--gray-900); letter-spacing: -0.4px; }
  .page-header p { color: var(--gray-500); margin-top: 2px; font-size: 13.5px; }
  .page-header-row { display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; gap: 12px; }
  .page-header-row h1 { font-size: 22px; font-weight: 800; color: var(--gray-900); letter-spacing: -0.4px; }
  .page-header-row .back-link { display: inline-flex; align-items: center; gap: 4px; color: var(--gray-500); font-size: 13.5px; text-decoration: none; font-weight: 500; }
  .page-header-row .back-link:hover { color: var(--brand); }
  .breadcrumb { display: flex; align-items: center; gap: 6px; margin-bottom: 20px; font-size: 13px; color: var(--gray-500); }
  .breadcrumb a { color: var(--brand); text-decoration: none; }
  .breadcrumb a:hover { text-decoration: underline; }
  .breadcrumb-sep { color: var(--gray-300); }

  /* ===== STAT CARDS ===== */
  .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 24px; }
  .stat-card {
    background: var(--white); border-radius: var(--radius);
    padding: 20px 22px; box-shadow: var(--shadow-sm);
    border: 1px solid var(--gray-200); border-left: 4px solid var(--brand);
  }
  .stat-card.warning { border-left-color: var(--warning); }
  .stat-card.danger  { border-left-color: var(--danger); }
  .stat-card.success { border-left-color: var(--success); }
  .stat-label { font-size: 12px; color: var(--gray-500); font-weight: 600; text-transform: uppercase; letter-spacing: .6px; margin-bottom: 6px; }
  .stat-value { font-size: 30px; font-weight: 800; color: var(--gray-900); letter-spacing: -1px; }

  /* ===== CARD ===== */
  .card {
    background: var(--white); border-radius: var(--radius);
    border: 1px solid var(--gray-200); box-shadow: var(--shadow-sm);
    padding: 24px;
  }
  .card-header {
    display: flex; align-items: center; justify-content: space-between;
    margin-bottom: 20px; padding-bottom: 16px; border-bottom: 1px solid var(--gray-100);
  }
  .card-title { font-size: 16px; font-weight: 700; color: var(--gray-800); }

  /* ===== TABLE ===== */
  .toolbar { display: flex; gap: 10px; margin-bottom: 16px; align-items: center; flex-wrap: wrap; }
  .search-group { display: flex; gap: 0; flex: 1; min-width: 240px; max-width: 400px; }
  .input-search {
    flex: 1; padding: 8px 14px; border: 1px solid var(--gray-300); border-right: none;
    border-radius: var(--radius) 0 0 var(--radius); font-size: 13.5px; font-family: inherit;
    background: var(--white); outline: none; color: var(--gray-800);
    transition: border-color .15s;
  }
  .input-search:focus { border-color: var(--brand); }
  .btn-search {
    padding: 8px 16px; background: var(--brand); color: #fff; border: none;
    border-radius: 0 var(--radius) var(--radius) 0; font-size: 13.5px; font-weight: 600;
    font-family: inherit; cursor: pointer; transition: background .15s;
  }
  .btn-search:hover { background: var(--brand-dk); }
  .select-filter {
    padding: 8px 12px; border: 1px solid var(--gray-300); border-radius: var(--radius);
    font-size: 13.5px; font-family: inherit; background: var(--white); color: var(--gray-700);
    cursor: pointer; outline: none;
  }
  .select-filter:focus { border-color: var(--brand); }
  .table-wrap { overflow-x: auto; }
  table { width: 100%; border-collapse: collapse; }
  thead th {
    background: var(--gray-50); padding: 10px 14px; text-align: left;
    font-size: 12px; font-weight: 700; color: var(--gray-500); text-transform: uppercase;
    letter-spacing: .5px; border-bottom: 1px solid var(--gray-200);
    white-space: nowrap;
  }
  tbody td { padding: 11px 14px; border-bottom: 1px solid var(--gray-100); color: var(--gray-700); vertical-align: middle; }
  tbody tr:last-child td { border-bottom: none; }
  tbody tr:hover td { background: var(--gray-50); }
  .td-name { font-weight: 600; color: var(--gray-800); }
  .badge {
    display: inline-block; padding: 2px 9px; border-radius: 20px;
    font-size: 11.5px; font-weight: 600;
  }
  .badge-blue    { background: #dbeafe; color: #1d4ed8; }
  .badge-green   { background: #dcfce7; color: #15803d; }
  .badge-orange  { background: #ffedd5; color: #c2410c; }
  .badge-red     { background: #fee2e2; color: #b91c1c; }
  .badge-purple  { background: #f3e8ff; color: #7c3aed; }
  .badge-teal    { background: #ccfbf1; color: #0f766e; }
  .badge-gray    { background: var(--gray-100); color: var(--gray-600); }
  .stok-cell { font-weight: 700; }
  .stok-ok     { color: var(--success); }
  .stok-tipis  { color: var(--warning); }
  .stok-habis  { color: var(--danger); }
  .action-group { display: flex; gap: 6px; }
  .table-footer { display: flex; align-items: center; justify-content: space-between; margin-top: 16px; flex-wrap: wrap; gap: 8px; }
  .table-info { font-size: 12.5px; color: var(--gray-500); }
  .pagination { display: flex; gap: 4px; align-items: center; }
  .pagination a, .pagination span {
    display: inline-flex; align-items: center; justify-content: center;
    width: 32px; height: 32px; border-radius: 6px; font-size: 13px; font-weight: 500;
    text-decoration: none; border: 1px solid var(--gray-200); color: var(--gray-600);
    transition: all .15s;
  }
  .pagination a:hover { background: var(--gray-100); border-color: var(--gray-300); }
  .pagination .active { background: var(--brand); color: #fff; border-color: var(--brand); }
  .pagination .disabled { color: var(--gray-300); pointer-events: none; }

  /* ===== FORM ===== */
  .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; }
  .form-group { display: flex; flex-direction: column; gap: 6px; }
  .form-group.full { grid-column: 1 / -1; }
  label { font-size: 13px; font-weight: 600; color: var(--gray-700); }
  label .req { color: var(--danger); margin-left: 2px; }
  .form-control {
    padding: 9px 13px; border: 1px solid var(--gray-300); border-radius: var(--radius);
    font-size: 13.5px; font-family: inherit; color: var(--gray-800); background: var(--white);
    outline: none; transition: border-color .15s, box-shadow .15s; width: 100%;
  }
  .form-control:focus { border-color: var(--brand); box-shadow: 0 0 0 3px rgba(30,111,207,.1); }
  .form-control.is-invalid { border-color: var(--danger); }
  textarea.form-control { resize: vertical; min-height: 90px; }
  .invalid-feedback { font-size: 12px; color: var(--danger); margin-top: 2px; }
  .form-actions { display: flex; gap: 10px; justify-content: flex-end; padding-top: 8px; }

  /* ===== FOTO UPLOAD ===== */
  .foto-upload-area {
    border: 2px dashed var(--gray-300); border-radius: var(--radius);
    padding: 32px; text-align: center; cursor: pointer;
    transition: border-color .2s, background .2s;
    background: var(--gray-50);
  }
  .foto-upload-area:hover { border-color: var(--brand); background: var(--brand-lt); }
  .foto-upload-icon { font-size: 36px; margin-bottom: 8px; }
  .foto-upload-text { font-size: 13px; color: var(--gray-500); margin-bottom: 10px; }
  .foto-upload-hint { font-size: 11.5px; color: var(--gray-400); }
  .foto-preview { max-width: 180px; max-height: 180px; border-radius: 8px; border: 1px solid var(--gray-200); margin-bottom: 10px; }
  #fotoInput { display: none; }
  .label-foto { font-size: 13px; font-weight: 600; color: var(--gray-700); margin-bottom: 8px; display: block; }

  /* ===== DETAIL PAGE ===== */
  .detail-header { display: flex; align-items: flex-start; gap: 20px; margin-bottom: 24px; }
  .detail-foto {
    width: 120px; height: 120px; border-radius: 10px; object-fit: cover;
    border: 1px solid var(--gray-200); background: var(--gray-100);
    flex-shrink: 0; display: flex; align-items: center; justify-content: center;
    font-size: 36px; color: var(--gray-300);
  }
  .detail-foto img { width: 100%; height: 100%; object-fit: cover; border-radius: 10px; }
  .detail-name { font-size: 20px; font-weight: 800; color: var(--gray-900); margin-bottom: 6px; }
  .detail-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 0; }
  .detail-item { padding: 14px 16px; border-bottom: 1px solid var(--gray-100); }
  .detail-item:nth-child(odd) { border-right: 1px solid var(--gray-100); }
  .detail-item-label { font-size: 11.5px; font-weight: 600; color: var(--gray-400); text-transform: uppercase; letter-spacing: .5px; margin-bottom: 4px; }
  .detail-item-value { font-size: 15px; font-weight: 700; color: var(--gray-800); }
  .detail-desc { padding: 16px; }
  .detail-desc-label { font-size: 11.5px; font-weight: 600; color: var(--gray-400); text-transform: uppercase; letter-spacing: .5px; margin-bottom: 6px; }
  .detail-desc-text { color: var(--gray-600); line-height: 1.7; font-size: 13.5px; }

  /* ===== MODAL ===== */
  .modal-overlay {
    position: fixed; inset: 0; background: rgba(15,23,42,.55);
    display: flex; align-items: center; justify-content: center;
    z-index: 1000; opacity: 0; pointer-events: none; transition: opacity .2s;
    backdrop-filter: blur(2px);
  }
  .modal-overlay.active { opacity: 1; pointer-events: all; }
  .modal-box {
    background: var(--white); border-radius: 12px; padding: 28px 28px 24px;
    max-width: 420px; width: 90%; box-shadow: var(--shadow-lg);
    transform: scale(.94) translateY(8px); transition: transform .2s;
  }
  .modal-overlay.active .modal-box { transform: scale(1) translateY(0); }
  .modal-icon { font-size: 32px; margin-bottom: 12px; }
  .modal-title { font-size: 18px; font-weight: 800; color: var(--gray-900); margin-bottom: 8px; }
  .modal-desc { color: var(--gray-500); font-size: 14px; line-height: 1.6; margin-bottom: 24px; }
  .modal-desc strong { color: var(--gray-800); }
  .modal-actions { display: flex; gap: 10px; justify-content: flex-end; }

  /* ===== ALERTS ===== */
  .alert { padding: 12px 16px; border-radius: var(--radius); font-size: 13.5px; font-weight: 500; margin-bottom: 16px; display: flex; align-items: center; gap: 8px; }
  .alert-success { background: #f0fdf4; color: #15803d; border: 1px solid #bbf7d0; }
  .alert-danger  { background: #fef2f2; color: #b91c1c; border: 1px solid #fecaca; }

  /* ===== BANTUAN ===== */
  .help-section { margin-bottom: 24px; }
  .help-section-title { font-size: 15px; font-weight: 700; color: var(--gray-800); margin-bottom: 12px; padding-bottom: 8px; border-bottom: 2px solid var(--brand-lt); }
  .help-steps { list-style: none; }
  .help-steps li { display: flex; gap: 12px; padding: 8px 0; align-items: flex-start; }
  .help-step-num { width: 24px; height: 24px; background: var(--brand); color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 700; flex-shrink: 0; margin-top: 1px; }
  .help-steps li p { font-size: 13.5px; color: var(--gray-600); }
  .help-steps li strong { color: var(--gray-800); }
  .help-note { background: var(--gray-50); border: 1px solid var(--gray-200); border-radius: var(--radius); padding: 12px 16px; font-size: 13px; color: var(--gray-600); display: flex; align-items: flex-start; gap: 8px; }
  .developer-card { background: linear-gradient(135deg, var(--brand-lt) 0%, #f0f9ff 100%); border: 1px solid var(--brand); border-radius: var(--radius); padding: 20px 22px; margin-top: 12px; }
  .developer-card h3 { font-size: 14px; font-weight: 700; color: var(--brand); margin-bottom: 12px; }
  .developer-info { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; }
  .dev-item { font-size: 13px; }
  .dev-item span:first-child { color: var(--gray-500); font-weight: 500; }
  .dev-item span:last-child { color: var(--gray-800); font-weight: 600; margin-left: 4px; }

  /* ===== EMPTY STATE ===== */
  .empty-state { text-align: center; padding: 48px 24px; color: var(--gray-400); }
  .empty-state-icon { font-size: 48px; margin-bottom: 12px; }
  .empty-state p { font-size: 14px; }

  /* ===== RESPONSIVE ===== */
  @media (max-width: 768px) {
    .stats-grid { grid-template-columns: repeat(2, 1fr); }
    .form-grid { grid-template-columns: 1fr; }
    .form-group.full { grid-column: 1; }
    .detail-grid { grid-template-columns: 1fr; }
    .detail-item:nth-child(odd) { border-right: none; }
    .developer-info { grid-template-columns: 1fr; }
    .navbar { padding: 0 16px; }
    .container { padding: 20px 16px; }
  }
</style>
</head>
<body>

<nav class="navbar">
  <a href="{{ route('barang.index') }}" class="nav-brand">❄️ <strong>Frozeria</strong> <span>Stok</span></a>
  <div class="nav-divider"></div>
  <a href="{{ route('barang.index') }}"   class="nav-link @yield('nav_dashboard')">Dashboard</a>
  <a href="{{ route('kategori.index') }}" class="nav-link @yield('nav_kategori')">Kategori</a>
  <a href="{{ route('bantuan.index') }}"  class="nav-link @yield('nav_bantuan')">Bantuan</a>
  <div class="nav-spacer"></div>
  @yield('nav_action')
</nav>

<div class="container">
  @if(session('success'))
    <div class="alert alert-success">✅ {{ session('success') }}</div>
  @endif
  @if(session('error'))
    <div class="alert alert-danger">❌ {{ session('error') }}</div>
  @endif

  @yield('content')
</div>

@yield('scripts')
</body>
</html>