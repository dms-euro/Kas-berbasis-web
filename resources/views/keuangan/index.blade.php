@extends('layouts.main')
@php
    $title = 'Data Transaksi Kas';
    $active = 'transaksi';
@endphp
@section('content')
<div class="row" id="table-striped">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Transaksi Kas</h4>
                <div class="row mt-2">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="bulan">Filter Bulan</label>
                            <select class="form-select" id="bulan" name="bulan">
                                <option value="">Pilih Bulan</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tahun">Filter Tahun</label>
                            <select class="form-select" id="tahun" name="tahun">
                                <option value="">Pilih Tahun</option>
                                @for($i = date('Y'); $i >= 2020; $i--)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button id="filterBtn" class="btn btn-primary">Filter</button>
                        <button id="resetBtn" class="btn btn-secondary ms-2">Reset</button>
                    </div>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <a href="{{ route('keuangan.create') }}" class="btn btn-primary">Tambah Transaksi</a>
                        </div>
                        <div class="col-md-6 text-end">
                            <div class="alert alert-info d-inline-block mb-0">
                                <strong>Rekap Bulan Ini:</strong>
                                <span class="badge bg-success">Sudah Bayar: 3</span>
                                <span class="badge bg-danger">Belum Bayar: 2</span>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA</th>
                                    <th>NO HP</th>
                                    <th>TANGGAL</th>
                                    <th>STATUS PEMBAYARAN</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Contoh data -->
                                <tr>
                                    <td>1</td>
                                    <td class="text-bold-500">Michael Right</td>
                                    <td>081234567890</td>
                                    <td>
                                        <input type="date" class="form-control" value="2023-08-15">
                                    </td>
                                    <td>
                                        <div class="form-check form-check-success">
                                            <input class="form-check-input payment-checkbox" type="checkbox" id="payment1" checked data-id="1">
                                            <label class="form-check-label" for="payment1">Sudah Bayar</label>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                                    </td>
                                </tr>

                                <!-- Data lainnya -->
                                <tr>
                                    <td>2</td>
                                    <td class="text-bold-500">Morgan Vanblum</td>
                                    <td>082345678901</td>
                                    <td>
                                        <input type="date" class="form-control" value="2023-08-16">
                                    </td>
                                    <td>
                                        <div class="form-check form-check-danger">
                                            <input class="form-check-input payment-checkbox" type="checkbox" id="payment2" data-id="2">
                                            <label class="form-check-label" for="payment2">Belum Bayar</label>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                                    </td>
                                </tr>

                                <!-- Tambahkan data lainnya sesuai kebutuhan -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Rekap per bulan -->
                    <div class="card mt-4">
                        <div class="card-header">
                            <h5>Rekapitulasi Pembayaran per Bulan</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Bulan/Tahun</th>
                                            <th>Total Anggota</th>
                                            <th>Sudah Bayar</th>
                                            <th>Belum Bayar</th>
                                            <th>Persentase</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Agustus 2023</td>
                                            <td>5</td>
                                            <td class="text-success">3</td>
                                            <td class="text-danger">2</td>
                                            <td>60%</td>
                                        </tr>
                                        <tr>
                                            <td>Juli 2023</td>
                                            <td>5</td>
                                            <td class="text-success">4</td>
                                            <td class="text-danger">1</td>
                                            <td>80%</td>
                                        </tr>
                                        <!-- Data rekap lainnya -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    $(document).ready(function() {
        // Filter data berdasarkan bulan dan tahun
        $('#filterBtn').click(function() {
            const bulan = $('#bulan').val();
            const tahun = $('#tahun').val();

            // Lakukan filter data (AJAX atau filter client-side)
            console.log('Filter by:', bulan, tahun);
            // Implementasi filter sesuai kebutuhan
        });

        // Reset filter
        $('#resetBtn').click(function() {
            $('#bulan').val('');
            $('#tahun').val('');
            // Reset tampilan data
        });

        // Update status pembayaran ketika checkbox diubah
        $('.payment-checkbox').change(function() {
            const id = $(this).data('id');
            const isChecked = $(this).is(':checked');

            // Update tampilan
            if(isChecked) {
                $(this).parent().removeClass('form-check-danger').addClass('form-check-success');
                $(this).next('label').text('Sudah Bayar');
            } else {
                $(this).parent().removeClass('form-check-success').addClass('form-check-danger');
                $(this).next('label').text('Belum Bayar');
            }

            // Kirim update ke server (AJAX)
            console.log('Update payment status for ID:', id, 'Status:', isChecked ? 'Paid' : 'Unpaid');
        });
    });
</script>
@endsection
@endsection
