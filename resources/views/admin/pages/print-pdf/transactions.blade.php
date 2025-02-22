<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions Report</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h2>Transactions Report</h2>
    <table>
        <thead>
            <tr>
                <th>Invoice</th>
                <th>Product</th>
                <th>Customer</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->invoice }}</td>
                    <td>{{ $transaction->product->name }}</td>
                    <td>{{ $transaction->customer->name }}</td>
                    <td>{{ $transaction->qty }}</td>
                    <td>{{ number_format($transaction->price, 0, ',', '.') }}</td>
                    <td>{{ number_format($transaction->qty * $transaction->price, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
