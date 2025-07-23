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
                <td>{{ $t->total_amount }}</td>
                <td>{{ $t->customer->name ?? '-' }}</td>
                <td>{{ $t->created_at->format('d-m-Y H:i') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
