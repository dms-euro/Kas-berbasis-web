@extends('layouts.main')
@php
    $title = 'Data Transaksi Kas';
    $active = 'kas';
@endphp
@section('content')
    <div class="page-heading">
        <h1 class="mb-2 me-4 text-primary"><i class="bi bi-wallet2 me-2"></i>Sistem Kas Keuangan</h1>
        <h3 class="fw-bold">Manajemen Keuangan</h3>
        <p class="text-muted">Kelola pembayaran kas anggota dengan mudah</p>
    </div>

    <!-- Form Filter -->
    <form action="{{ url('/kas') }}" method="GET" class="filter-section">
        <div class="row">
            <div class="col-md-3 mb-2">
                <label for="monthFilter" class="form-label">Bulan</label>
                <select class="form-select" id="monthFilter" name="month">
                    <option value="" {{ request('month') == '' ? 'selected' : '' }}>Semua Bulan</option>
                    @foreach ($bulanList as $bulan)
                        <option value="{{ $bulan['value'] }}" {{ request('month') == $bulan['value'] ? 'selected' : '' }}>
                            {{ $bulan['label'] }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mb-2">
                <label for="statusFilter" class="form-label">Status</label>
                <select class="form-select" id="statusFilter" name="status">
                    <option value="" {{ request('status') == '' ? 'selected' : '' }}>Semua Status</option>
                    <option value="Lunas" {{ request('status') == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                    <option value="Belum bayar" {{ request('status') == 'Belum bayar' ? 'selected' : '' }}>Belum Bayar
                    </option>
                </select>
            </div>
            <div class="col-md-4 mb-2">
                <label for="searchInput" class="form-label">Cari Anggota</label>
                <input type="text" class="form-control" id="searchInput" name="search" placeholder="Nama anggota..."
                    value="{{ request('search') }}">
            </div>
            <div class="col-md-2 d-flex align-items-end mb-2">
                <button type="submit" class="btn btn-primary w-100"><i class="bi bi-filter me-1"></i> Filter</button>
            </div>
        </div>
    </form>
        <div class="card dashboard-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title mb-0">Daftar Pembayaran Kas</h5>
                    @if (auth()->user()->level === 'admin')
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahKasModal">
                            <i class="bi bi-plus-circle me-1"></i> Tambah Pembayaran
                        </button>
                    @endif
                </div>
                <div class="table-responsive">
                    <table class="table table-hover finance-table text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Anggota</th>
                                <th>Tanggal</th>
                                <th>Status Bayar</th>
                                <th>Petugas</th>
                                @if (auth()->user()->level === 'admin')
                                    <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kas as $index => $pembayaran)
                                <tr>
                                    <th>{{ $kas->firstItem() + $index }}</th>
                                    <td>{{ $pembayaran->nama }}</td>
                                    <td>{{ \Carbon\Carbon::parse($pembayaran->tanggal)->format('d M Y') }}</td>
                                    <td>
                                        @if (strtolower($pembayaran->status_bayar) == 'lunas')
                                            <span class="badge-paid ms-2"><i class="bi bi-check-circle me-1"></i>Lunas</span>
                                        @else
                                            <span class="badge-pending ms-2"><i class="bi bi-clock me-1"></i>Belum bayar</span>
                                        @endif
                                    </td>
                                    <td>{{ $pembayaran->petugas }}</td>
                                    @if (auth()->user()->level === 'admin')
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary btn-action me-1"
                                                data-bs-toggle="modal" data-bs-target="#editKasModal-{{ $pembayaran->id }}">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <form action="{{ route('kas.destroy', $pembayaran->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Yakin hapus data ini?')"
                                                    class="btn btn-sm btn-outline-danger btn-action">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data pembayaran.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <nav aria-label="Page navigation">
                    {{ $kas->withQueryString()->links('pagination::bootstrap-5') }}
                </nav>
            </div>
        </div>
    <!-- Modal Tambah -->
    <div class="modal fade" id="tambahKasModal" tabindex="-1" aria-labelledby="tambahKasModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" method="POST" action="{{ route('kas.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahKasModalLabel">Tambah Pembayaran Kas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="namaAnggota" class="form-label">Nama Anggota</label>
                        <select class="form-select" id="namaAnggota" name="nama" required>
                            <option value="" disabled selected>Pilih Anggota</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->nama }}">{{ $user->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggalBayar" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggalBayar" name="tanggal" required>
                    </div>
                    <div class="mb-3">
                        <label for="statusBayar" class="form-label">Status Bayar</label>
                        <select class="form-select" id="statusBayar" name="status_bayar" required>
                            <option value="Lunas">Lunas</option>
                            <option value="Belum bayar">Belum Bayar</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="petugas" class="form-label">Petugas</label>
                        <input type="text" class="form-control" id="petugas" name="petugas" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    {{-- Modal Edit Semua Data (Letakkan di bawah halaman, setelah tabel) --}}
    @foreach ($kas as $pembayaran)
        <div class="modal fade" id="editKasModal-{{ $pembayaran->id }}" tabindex="-1"
            aria-labelledby="editKasModalLabel-{{ $pembayaran->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="{{ route('kas.update', $pembayaran->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Pembayaran Kas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="namaAnggota-{{ $pembayaran->id }}" class="form-label">Nama Anggota</label>
                            <select class="form-select" id="namaAnggota-{{ $pembayaran->id }}" name="nama" required>
                                <option value="" disabled>Pilih Anggota</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->nama }}"
                                        {{ $pembayaran->nama == $user->nama ? 'selected' : '' }}>
                                        {{ $user->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tanggalBayar-{{ $pembayaran->id }}" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggalBayar-{{ $pembayaran->id }}"
                                name="tanggal" value="{{ \Carbon\Carbon::parse($pembayaran->tanggal)->format('Y-m-d') }}"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="statusBayar-{{ $pembayaran->id }}" class="form-label">Status Bayar</label>
                            <select class="form-select" id="statusBayar-{{ $pembayaran->id }}" name="status_bayar"
                                required>
                                <option value="" disabled {{ $pembayaran->status_bayar == null ? 'selected' : '' }}>
                                    Pilih Status Pembayaran</option>
                                <option value="Lunas" {{ $pembayaran->status_bayar == 'Lunas' ? 'selected' : '' }}>Lunas
                                </option>
                                <option value="Belum bayar"
                                    {{ $pembayaran->status_bayar == 'Belum bayar' ? 'selected' : '' }}>Belum Bayar</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="petugas-{{ $pembayaran->id }}" class="form-label">Petugas</label>
                            <input type="text" class="form-control" id="petugas-{{ $pembayaran->id }}"
                                name="petugas" value="{{ $pembayaran->petugas }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection
