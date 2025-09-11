@extends('layouts.main')
@php
    $title = 'Data User';
    $active = 'user';
@endphp
@section('content')
    <div class="page-heading">
        <h1 class="mb-2 me-4 text-primary"><i class="bi bi-wallet2 me-2"></i>Sistem Kas Keuangan</h1>
        <h3 class="fw-bold">Manajemen Anggota</h3>
    </div>
    <div class="card dashboard-card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title mb-0">Daftar User/Anngota</h5>
                @if (auth()->user()->level === 'admin')
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModalCenter">
                        <i class="iconly-boldUser"></i>
                        Tambah Anggota
                    </button>
                @endif
            </div>
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title mb-0"><i class="iconly-boldUser me-2"></i>Anggota Karang Taruna RT-08</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle mb-0">
                        <thead class="table-primary">
                            <tr>
                                <th style="width: 50px;">#</th>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>Level</th>
                                @if (auth()->user()->level === 'admin')
                                    <th style="width: 120px;">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $index => $user)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td class="fw-semibold">{{ $user->username }}</td>
                                    <td>{{ $user->nama }}</td>
                                    <td>
                                        <span class="badge {{ $user->level === 'admin' ? 'bg-success' : 'bg-secondary' }}">
                                            {{ ucfirst($user->level) }}
                                        </span>
                                    </td>
                                    @if (auth()->user()->level === 'admin')
                                        <td>
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm"
                                                    onclick="return confirm('Yakin hapus user ini?')">
                                                    <i class="iconly-boldDelete"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">Belum ada anggota terdaftar.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">
                        Tambah User
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="level" class="form-label">Level</label>
                            <select class="form-select" id="level" name="level" required>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
