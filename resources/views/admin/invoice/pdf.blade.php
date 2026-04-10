<style>
    body {
        font-family: DejaVu Sans, sans-serif;
        background: #fff;
    }

    .invoice-box {
        width: 100%;
        padding: 20px;
    }

    .logo {
        display: block;
        margin: 0 auto;
        height: 80px;
    }

    .title {
        text-align: center;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid #000;
    }

    th {
        background: #000;
        color: #fff;
        padding: 8px;
    }

    td {
        padding: 8px;
    }

    .totals {
        text-align: right;
        margin-top: 20px;
    }
</style>

<div class="invoice-box">

  <img src="{{ url('assets/frontend/img/logo.png') }}" class="logo" alt="Logo">

    <div class="title">
        <h2>INVOICE</h2>
        <p>Invoice #{{ $invoice->id }}</p>
    </div>

    <table width="100%" style="margin-bottom: 20px; border-collapse: collapse;">
        <tr>
            <!-- From -->
            <td width="50%" style="vertical-align: top; border: none; padding: 0;">
                <strong>From:</strong><br><br>
                ERP<br>
                Colombo<br>
                erp@gmail.com
            </td>

            <!-- To -->
            <td width="50%" style="vertical-align: top; text-align: right; border: none; padding: 0;">
                <strong>To:</strong><br><br>
                {{ $invoice->customer->firstname }} {{ $invoice->customer->lastname }}<br>
                {{ $invoice->customer->city }}<br>
                {{ $invoice->customer->telephone }}

            </td>
        </tr>
    </table>

    <br>

    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoice->products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->pivot->quantity }}</td>
                    <td>{{ number_format($product->pivot->price, 2) }}</td>
                    <td>{{ number_format($product->pivot->quantity * $product->pivot->price, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="totals">
        <strong>Total: {{ number_format($invoice->total, 2) }}</strong>
    </div>

</div>
