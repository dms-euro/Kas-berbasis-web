@extends('layouts.main')
@php
    $title = 'Data Transaksi Kas';
    $active = 'transaksi';
@endphp
@section('content')
    <div class="page-heading">
        <h1 class="mb-2 me-4 text-primary"><i class="bi bi-wallet2 me-2"></i>Sistem Kas Keuangan</h1>
        <h3 class="fw-bold">Manajemen Keuangan</h3>
        <p class="text-muted">Kelola pembayaran kas anggota dengan mudah</p>
    </div>

    <div class="row">
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon blue">
                                <i class="iconly-boldProfile"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Anggota</h6>
                            <h6 class="font-extrabold mb-0">100</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon purple">
                                <i class="iconly-boldUpload"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Pemasukan</h6>
                            <h6 class="font-extrabold mb-0">112.000</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon green">
                                <i class='iconly-boldDownload'></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Pengluaran</h6>
                            <h6 class="font-extrabold mb-0">80.000</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon red">
                                <i class='iconly-boldWallet'></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Saldo</h6>
                            <h6 class="font-extrabold mb-0">112.000.000</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="d-flex justify-content-between mb-4">
        <h3 class="section-title">Daftar Transaksi</h3>
        <div>
            <button class="btn btn-success me-2"><i class="fas fa-plus-circle me-1"></i> Tambah Transaksi</button>
            <button class="btn btn-outline-primary"><i class="fas fa-download me-1"></i> Export</button>
        </div>
    </div>
    <div class="card dashboard-card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover finance-table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Username</th>
                            <th scope="col" class="text-center">Jenis</th>
                            <th scope="col" class="text-end">Jumlah</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Iuran Bulanan November</td>
                            <td>05 Nov 2023</td>
                            <td>ahmad</td>
                            <td class="text-center"><span class="badge badge-pemasukan">Pemasukan</span></td>
                            <td class="text-end text-success fw-bold">Rp 250.000</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-primary btn-action me-1"><i
                                        class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-outline-danger btn-action"><i
                                        class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Dana Kegiatan Bakti Sosial</td>
                            <td>07 Nov 2023</td>
                            <td>budi</td>
                            <td class="text-center"><span class="badge badge-pengeluaran">Pengeluaran</span></td>
                            <td class="text-end text-danger fw-bold">Rp 750.000</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-primary btn-action me-1"><i
                                        class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-outline-danger btn-action"><i
                                        class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Sumbangan dari Donatur</td>
                            <td>10 Nov 2023</td>
                            <td>dewi</td>
                            <td class="text-center"><span class="badge badge-pemasukan">Pemasukan</span></td>
                            <td class="text-end text-success fw-bold">Rp 500.000</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-primary btn-action me-1"><i
                                        class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-outline-danger btn-action"><i
                                        class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Pembelian Perlengkapan</td>
                            <td>12 Nov 2023</td>
                            <td>rina</td>
                            <td class="text-center"><span class="badge badge-pengeluaran">Pengeluaran</span></td>
                            <td class="text-end text-danger fw-bold">Rp 350.000</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-primary btn-action me-1"><i
                                        class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-outline-danger btn-action"><i
                                        class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Iuran Bulanan November</td>
                            <td>15 Nov 2023</td>
                            <td>sari</td>
                            <td class="text-center"><span class="badge badge-pemasukan">Pemasukan</span></td>
                            <td class="text-end text-success fw-bold">Rp 200.000</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-primary btn-action me-1"><i
                                        class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-outline-danger btn-action"><i
                                        class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <nav aria-label="Page navigation example" class="mt-4">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="col-md-6 mb-4">
                <div class="card dashboard-card">
                    <div class="card-header bg-transparent">
                        <h5 class="card-title mb-0"><i class="fas fa-table me-2"></i>Rekap per Bulan</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Bulan</th>
                                        <th class="text-end">Pemasukan</th>
                                        <th class="text-end">Pengeluaran</th>
                                        <th class="text-end">Saldo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>November 2023</td>
                                        <td class="text-end text-success">Rp 8.250.000</td>
                                        <td class="text-end text-danger">Rp 5.870.500</td>
                                        <td class="text-end fw-bold">Rp 2.379.500</td>
                                    </tr>
                                    <tr>
                                        <td>Oktober 2023</td>
                                        <td class="text-end text-success">Rp 7.350.000</td>
                                        <td class="text-end text-danger">Rp 5.420.000</td>
                                        <td class="text-end fw-bold">Rp 1.930.000</td>
                                    </tr>
                                    <tr>
                                        <td>September 2023</td>
                                        <td class="text-end text-success">Rp 6.800.000</td>
                                        <td class="text-end text-danger">Rp 4.950.000</td>
                                        <td class="text-end fw-bold">Rp 1.850.000</td>
                                    </tr>
                                    <tr class="fw-bold">
                                        <td>Total</td>
                                        <td class="text-end text-success">Rp 22.400.000</td>
                                        <td class="text-end text-danger">Rp 16.240.500</td>
                                        <td class="text-end">Rp 6.159.500</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
@endsection
