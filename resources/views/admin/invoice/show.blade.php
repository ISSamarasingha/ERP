@extends('layouts.admin')

@section('content')
    <div class="card mt-4">
        <div class="card-header  d-flex justify-content-between align-items-center">
            <h4>Invoice #{{ $invoice->id }}</h4>
            <p>Customer: {{ $invoice->customer->firstname }} {{ $invoice->customer->lastname }}</p>
            <p>Date: {{ $invoice->created_at->format('Y-m-d H:i') }}</p>

            <div>
               <a href="{{ route('invoices.pdf', $invoice->id) }}" class="btn btn-success">Print</a>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
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

            <div class="d-flex justify-content-end mt-3">
                <h5>Total: {{ number_format($invoice->total, 2) }}</h5>
            </div>
        </div>
    </div>
@endsection
