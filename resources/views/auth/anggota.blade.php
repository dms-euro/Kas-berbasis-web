@extends('layouts.main')
@php
    $title = 'Data User';
    $active = 'user';
@endphp
@section('content')
    <div class="page-heading">
        <h1 class="mb-2 me-4 text-primary"><i class="bi bi-wallet2 me-2"></i>Sistem Kas Keuangan</h1>
        <h3 class="fw-bold">Manajemen user</h3>
    </div>
    <div class="card dashboard-card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title mb-0">Daftar User/Anngota</h5>
                <button class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i> Tambah User</button>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Anggota</h4>
                </div>
                <!-- table striped -->
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Nama</th>
                                <th>Level</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td class="text-bold-500">Michael Right</td>
                                <td>abcd</td>
                                <td class="text-bold-500">Michael</td>
                                <td>Admin</td>
                                <td>Edit</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
