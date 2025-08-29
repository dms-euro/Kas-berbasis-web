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
                <button class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i> Tambah Pembayaran</button>
            </div>

            <div class="table-responsive">
                <table class="table table-hover finance-table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Anggota</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col" class="text-center">Status Bayar</th>
                            <th scope="col" class="text-center">Petugas</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Ahmad Susanto</td>
                            <td>12 Nov 2023</td>
                            <td class="text-center">
                                <div class="form-check d-inline-block">
                                    <input class="form-check-input" type="checkbox" checked disabled>
                                </div>
                                <span class="badge-paid ms-2"><i class="bi bi-check-circle me-1"></i>Lunas</span>
                            </td>
                            <td class="text-center">Budi</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-primary btn-action me-1"><i
                                        class="bi bi-pencil"></i></button>
                                <button class="btn btn-sm btn-outline-danger btn-action"><i
                                        class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Rina Wijaya</td>
                            <td>12 Nov 2023</td>
                            <td class="text-center">
                                <div class="form-check d-inline-block">
                                    <input class="form-check-input" type="checkbox" checked disabled>
                                </div>
                                <span class="badge-paid ms-2"><i class="bi bi-check-circle me-1"></i>Lunas</span>
                            </td>
                            <td class="text-center">Sari</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-primary btn-action me-1"><i
                                        class="bi bi-pencil"></i></button>
                                <button class="btn btn-sm btn-outline-danger btn-action"><i
                                        class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
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
@endsection
