{{-- @dd($transaction) --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice {{ $transaction->invoice }}</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
        h1, h2 { margin-bottom: 5px; }
    </style>
</head>
<body>
    <h1>Invoice: {{ $transaction->invoice }}</h1>
    <p><strong>Tanggal:</strong> {{ $transaction->created_at->format('d-m-Y H:i') }}</p>
    <p><strong>Jenis Transaksi:</strong> {{ ucfirst($transaction->type) }}</p>
    <p><strong>Customer :</strong> {{ $transaction->customer->name }}</p>

    <h2>Daftar Produk</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Subtotal (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaction->transactionProducts as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $product->product->name }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ number_format($product->subtotal, 0, ',', '.') }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" align="right"><strong>Total</strong></td>
                <td><strong>Rp{{ number_format($transaction->total_amount, 0, ',', '.') }}</strong></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
