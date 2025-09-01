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
    <div class="filter-section">
        <div class="row">
            <div class="col-md-3 mb-2">
                <label for="monthFilter" class="form-label">Bulan</label>
                <select class="form-select" id="monthFilter">
                    <option selected>November 2023</option>
                    <option>Oktober 2023</option>
                    <option>September 2023</option>
                </select>
            </div>
            <div class="col-md-3 mb-2">
                <label for="statusFilter" class="form-label">Status</label>
                <select class="form-select" id="statusFilter">
                    <option selected>Semua Status</option>
                    <option>Sudah Bayar</option>
                    <option>Belum Bayar</option>
                </select>
            </div>
            <div class="col-md-4 mb-2">
                <label for="searchInput" class="form-label">Cari Anggota</label>
                <input type="text" class="form-control" id="searchInput" placeholder="Nama anggota...">
            </div>
            <div class="col-md-2 d-flex align-items-end mb-2">
                <button class="btn btn-primary w-100"><i class="bi bi-filter me-1"></i> Filter</button>
            </div>
        </div>
    </div>
    <div class="card dashboard-card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title mb-0">Daftar Pembayaran Kas</h5>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahKasModal">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Pembayaran
                </button>
            </div>
            <div class="table-responsive">
                <table class="table table-hover finance-table text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Anggota</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Status Bayar</th>
                            <th scope="col">Petugas</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1</th>
                            <td>Rina Wijaya</td>
                            <td>12 Nov 2023</td>
                            <td>
                                <span class="badge-paid ms-2"><i class="bi bi-check-circle me-1"></i>Lunas</span>
                            </td>
                            <td>Sari</td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary btn-action me-1"><i
                                        class="bi bi-pencil"></i></button>
                                <button class="btn btn-sm btn-outline-danger btn-action"><i
                                        class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-primary">
                    <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>

            <div class="modal fade" id="tambahKasModal" tabindex="-1" aria-labelledby="tambahKasModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form class="modal-content" method="POST" action="#">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahKasModalLabel">Tambah Pembayaran Kas</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="namaAnggota" class="form-label">Nama Anggota</label>
                                <select class="form-select" id="namaAnggota" name="nama_anggota" required>
                                    <option value="" disabled selected>Pilih Anggota</option>
                                    @foreach($users as $user)
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
                                    <option value="Belum Bayar">Belum Bayar</option>
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
@endsection
