    @extends('layouts.main')
    @php
        $title = 'Tambah Transaksi';
        $active = 'transaksi';
    @endphp
    @section('content')
    <div class="container">
        <h2>Tambah Transaksi</h2>

        <form action="{{ route('keuangan.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Keterangan</label>
                <input type="text" name="keterangan" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Jenis</label>
                <select name="jenis" class="form-control" required>
                    <option value="">-- Pilih Jenis --</option>
                    <option value="pemasukan">Pemasukan</option>
                    <option value="pengeluaran">Pengeluaran</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Jumlah</label>
                <input type="number" name="jumlah" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('keuangan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    @endsection
