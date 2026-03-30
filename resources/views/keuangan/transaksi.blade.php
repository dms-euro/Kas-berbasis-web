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

    <div class="d-flex justify-content-between mb-4">
        <h3 class="section-title">Daftar Transaksi</h3>
    </div>
    <div class="card dashboard-card mb-3">
        <div class="d-flex justify-content-end m-3 gap-2">
            {{-- tombol export pdf --}}
            <a href="{{ route('keuangan.export.pdf') }}" class="btn btn-danger">
                <i class="bi bi-file-earmark-pdf me-1"></i> Export PDF
            </a>
            @if (auth()->user()->level === 'admin')
                <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#transaksiModal">
                    <i class="bi bi-plus-circle me-1"></i> Tambah
                </button>
            @endif
        </div>
        <div class="card-body mt-0">
            <div class="table-responsive">
                <table class="table table-hover finance-table text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Username</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Nominal</th>
                            @if (auth()->user()->level === 'admin')
                                <th scope="col">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($keuangan as $index => $transaksi)
                            <tr>
                                <th>{{ $keuangan->firstItem() + $index }}</th>
                                <td>{{ $transaksi->keterangan }}</td>
                                <td>{{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d M Y') }}</td>
                                <td>{{ $transaksi->username }}</td>
                                <td>
                                    @if ($transaksi->jenis == 'pemasukan')
                                        <span class="badge-paid ms-2"><i
                                                class="bi bi-check-circle me-1"></i>Pemasukan</span>
                                    @else
                                        <span class="badge-failed ms-2"><i
                                                class="bi bi-x-circle me-1"></i>Pengeluaran</span>
                                    @endif
                                </td>
                                <td>Rp {{ number_format($transaksi->nominal, 0, ',', '.') }}</td>
                                @if (auth()->user()->level === 'admin')
                                    <td>
                                        <form action="{{ route('keuangan.destroy', $transaksi->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger btn-action"
                                                onclick="return confirm('Yakin ingin menghapus?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if ($keuangan->lastPage() > 1)
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-primary justify-content-center mt-3">
                        <li class="page-item {{ $keuangan->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $keuangan->previousPageUrl() }}">Prev</a>
                        </li>

                        @for ($i = 1; $i <= $keuangan->lastPage(); $i++)
                            <li class="page-item {{ $keuangan->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ $keuangan->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        <li class="page-item {{ !$keuangan->hasMorePages() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $keuangan->nextPageUrl() }}">Next</a>
                        </li>
                    </ul>
                </nav>
            @endif
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="transaksiModal" tabindex="-1" aria-labelledby="transaksiModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('keuangan.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="transaksiModalLabel">Tambah Transaksi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="jenis" class="form-label">Jenis</label>
                            <select class="form-select" id="jenis" name="jenis" required>
                                <option value="pemasukan">Pemasukan</option>
                                <option value="pengeluaran">Pengeluaran</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nominal" class="form-label">Nominal</label>
                            <input type="number" class="form-control" id="nominal" name="nominal" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
