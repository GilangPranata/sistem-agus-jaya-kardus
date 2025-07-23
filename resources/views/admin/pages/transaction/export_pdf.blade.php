<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Transaksi</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: center; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Riwayat Transaksi</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis</th>
                <th>Invoice</th>
                <th>Total</th>
                <th>Customer</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $i => $t)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $t->type == 'purchase' ? 'Pembelian' : 'Penjualan' }}</td>
                    <td>{{ $t->invoice }}</td>
                    <td>Rp {{ number_format($t->total_amount, 0, ',', '.') }}</td>
                    <td>{{ $t->customer->name ?? '-' }}</td>
                    <td>{{ $t->created_at->format('d-m-Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
