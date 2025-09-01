@extends('layouts.main')
@php
    $title = 'Dashboard';
    $active = 'dashboard';
@endphp
@section('content')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h1 class="mb-2 me-4 text-primary"><i class="bi bi-wallet2 me-2"></i>Sistem Kas Keuangan</h1>
        <h3 class="fw-bold">Manajemen Keuangan</h3>
        <p class="text-muted">Kelola pembayaran kas anggota dengan mudah</p>
    </div>
    <div class="page-content">
        <section class="row">
            <div id="pembatas" class="card border-0 ">
                <div class="row mt-3">
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
                                        <h6 class="font-extrabold mb-0">{{ \App\Models\User::count() }}</h6>
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
                                        <h6 class="font-extrabold mb-0">
                                            Rp
                                            {{ number_format(\App\Models\Keuangan::where('jenis', 'pemasukan')->sum('nominal'), 0, ',', '.') }}
                                        </h6>
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
                                        <h6 class="text-muted font-semibold">Pengeluaran</h6>
                                        <h6 class="font-extrabold mb-0">
                                            Rp
                                            {{ number_format(\App\Models\Keuangan::where('jenis', 'pengeluaran')->sum('nominal'), 0, ',', '.') }}
                                        </h6>
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
                                        <h6 class="font-extrabold mb-0">
                                            Rp
                                            {{ number_format(
                                                \App\Models\Keuangan::where('jenis', 'pemasukan')->sum('nominal') -
                                                    \App\Models\Keuangan::where('jenis', 'pengeluaran')->sum('nominal'),
                                                0,
                                                ',',
                                                '.',
                                            ) }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white rounded-top m-3">
                        <h5 class="card-title mb-0"><i class="fas fa-table me-2"></i>Rekap per Bulan ({{ date('Y') }})</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered align-middle">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Bulan</th>
                                        <th class="text-end">Pemasukan</th>
                                        <th class="text-end">Pengeluaran</th>
                                        <th class="text-end">Saldo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $bulanList = [
                                            1 => 'Januari',
                                            2 => 'Februari',
                                            3 => 'Maret',
                                            4 => 'April',
                                            5 => 'Mei',
                                            6 => 'Juni',
                                            7 => 'Juli',
                                            8 => 'Agustus',
                                            9 => 'September',
                                            10 => 'Oktober',
                                            11 => 'November',
                                            12 => 'Desember',
                                        ];
                                        $totalPemasukan = 0;
                                        $totalPengeluaran = 0;
                                        $totalSaldo = 0;
                                    @endphp
                                    @for ($m = 1; $m <= 12; $m++)
                                        @php
                                            $pemasukan = \App\Models\Keuangan::whereYear('tanggal', date('Y'))
                                                ->whereMonth('tanggal', $m)
                                                ->where('jenis', 'pemasukan')
                                                ->sum('nominal');
                                            $pengeluaran = \App\Models\Keuangan::whereYear('tanggal', date('Y'))
                                                ->whereMonth('tanggal', $m)
                                                ->where('jenis', 'pengeluaran')
                                                ->sum('nominal');
                                            $saldo = $pemasukan - $pengeluaran;
                                            $totalPemasukan += $pemasukan;
                                            $totalPengeluaran += $pengeluaran;
                                            $totalSaldo += $saldo;
                                        @endphp
                                        <tr>
                                            <td>
                                                <span class="text-dark px-3 py-2">{{ $bulanList[$m] }} {{ date('Y') }}</span>
                                            </td>
                                            <td class="text-end text-success fw-semibold">Rp {{ number_format($pemasukan, 0, ',', '.') }}</td>
                                            <td class="text-end text-danger fw-semibold">Rp {{ number_format($pengeluaran, 0, ',', '.') }}</td>
                                            <td class="text-end fw-bold {{ $saldo >= 0 ? 'text-primary' : 'text-danger' }}">
                                                Rp {{ number_format($saldo, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endfor
                                    <tr class="table-secondary fw-bold">
                                        <td>Total</td>
                                        <td class="text-end text-success">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</td>
                                        <td class="text-end text-danger">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</td>
                                        <td class="text-end text-primary">Rp {{ number_format($totalSaldo, 0, ',', '.') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
