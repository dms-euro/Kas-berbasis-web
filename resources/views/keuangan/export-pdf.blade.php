<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi Kas</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: center; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; margin-bottom: 0; }
        p { text-align: center; margin-top: 0; font-size: 12px; }
    </style>
</head>
<body>
    <h2>Laporan Transaksi Kas</h2>
    <p>{{ now()->format('d M Y H:i') }}</p>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
                <th>Username</th>
                <th>Jenis</th>
                <th>Nominal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($keuangan as $index => $row)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $row->keterangan }}</td>
                    <td>{{ \Carbon\Carbon::parse($row->tanggal)->format('d-m-Y') }}</td>
                    <td>{{ $row->username }}</td>
                    <td>{{ ucfirst($row->jenis) }}</td>
                    <td>Rp {{ number_format($row->nominal, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
