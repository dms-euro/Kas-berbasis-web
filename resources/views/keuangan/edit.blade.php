{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Transaksi</h2>

    <form action="{{ route('keuangan.update', $keuangan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="{{ $keuangan->tanggal }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <input type="text" name="keterangan" value="{{ $keuangan->keterangan }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis</label>
            <select name="jenis" class="form-control" required>
                <option value="pemasukan" {{ $keuangan->jenis == 'pemasukan' ? 'selected' : '' }}>Pemasukan</option>
                <option value="pengeluaran" {{ $keuangan->jenis == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" value="{{ $keuangan->jumlah }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('keuangan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection --}}
