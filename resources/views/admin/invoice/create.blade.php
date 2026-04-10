
@extends('layouts.admin')

@section('content')
<div class="card mt-4">
    <div class="card-header">
        <h4 class="mb-0">Create Invoice</h4>
    </div>

    <!-- Success Alert -->
    <div id="successAlert" class="alert alert-success" style="display:none;"></div>

    <form id="invoiceForm" method="POST" action="{{ route('invoices.store') }}">
        @csrf

        <div class="card-body">
            <!-- Customer & Date -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <select name="customer_id" id="customerSelect" class="form-control" required>
                        <option value="" disabled selected>Select a Customer</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">
                                {{ $customer->firstname }} {{ $customer->lastname }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <input type="datetime-local" name="invoice_datetime" value="{{ now()->format('Y-m-d\TH:i') }}"
                           class="form-control" readonly>
                </div>
            </div>

            <!-- Product Selection -->
            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <select name="product_id" class="form-control" id="productSelect">
                        <option value="" disabled selected>Select a Product</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" data-price="{{ $product->price }}" data-name="{{ $product->name }}">
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <input type="number" name="quantity" id="quantityInput" class="form-control" placeholder="Enter Quantity" min="1">
                </div>

                <div class="col-md-4">
                    <button type="button" id="addProductBtn" class="btn btn-success w-100">Add</button>
                </div>
            </div>
        </div>

        <!-- Invoice Table -->
        <div class="card-body">
            <div class="card mb-4">
                <div class="card-body">
                    <table id="invoiceTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="invoiceTableBody"></tbody>
                    </table>

                    <!-- Hidden inputs for submission -->
                    <div id="invoiceItems" style="display:none;"></div>
                </div>
            </div>
        </div>

        <!-- Total, Paid & Balance -->
        <div class="card-body mt-4">
            <hr class="my-3">
            <div class="row justify-content-end">

                <div class="col-md-8">
                    <div class="col-md-8 mb-3">
                        <select name="payment_method" id="paymentMethod" class="form-control" required>
                            <option value="" disabled selected>Select Payment Method</option>
                            <option value="cash">Cash</option>
                            <option value="card">Card</option>
                            <option value="bank">Bank Transfer</option>
                        </select>
                    </div>

                    <div class="col-md-8 mb-3">
                        <input type="number" name="paidamount" id="paidInput" class="form-control" placeholder="Paid Amount" min="0">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="d-flex justify-content-between mb-3">
                        <strong>Total:</strong>
                        <strong id="totalAmount">0.00</strong>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <strong>Balance:</strong>
                        <strong id="balanceAmount">0.00</strong>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Create Invoice</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {
    const addBtn = document.getElementById("addProductBtn");
    const tableBody = document.getElementById("invoiceTableBody");
    const totalElement = document.getElementById("totalAmount");
    const balanceElement = document.getElementById("balanceAmount");
    const hiddenContainer = document.getElementById("invoiceItems");
    const successAlert = document.getElementById("successAlert");
    const paidInput = document.getElementById("paidInput");

    // Update balance as Paid - Total
    function updateBalance() {
        const total = parseFloat(totalElement.innerText) || 0;
        const paid = parseFloat(paidInput.value) || 0;
        const balance = paid - total; // Changed here: Paid - Total
        balanceElement.innerText = balance.toFixed(2);

        // Turn red if balance is negative, black otherwise
        if (balance < 0) {
            balanceElement.style.color = 'red';
        } else {
            balanceElement.style.color = 'black';
        }
    }

    function updateTotal(amountChange) {
        let total = parseFloat(totalElement.innerText) || 0;
        total += amountChange;
        totalElement.innerText = total.toFixed(2);
        updateBalance();
    }

    addBtn.addEventListener("click", function() {
        const productSelect = document.getElementById("productSelect");
        const quantityInput = document.getElementById("quantityInput");

        if (!productSelect.value || !quantityInput.value) {
            alert("Please select a product and enter quantity");
            return;
        }

        const selectedOption = productSelect.options[productSelect.selectedIndex];
        const productId = productSelect.value;
        const productName = selectedOption.dataset.name;
        const price = parseFloat(selectedOption.dataset.price);
        const quantity = parseInt(quantityInput.value);
        const totalPrice = price * quantity;

        // Add row to table
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${productId}</td>
            <td>${productName}</td>
            <td>${quantity}</td>
            <td>${totalPrice.toFixed(2)}</td>
            <td><button type="button" class="btn btn-danger btn-sm remove-btn">Remove</button></td>
        `;
        tableBody.appendChild(row);

        // Add hidden inputs for submission
        const hiddenRow = document.createElement("div");
        hiddenRow.classList.add("invoice-item");
        hiddenRow.innerHTML = `
            <input type="hidden" name="products[${productId}][product_id]" value="${productId}">
            <input type="hidden" name="products[${productId}][quantity]" value="${quantity}">
            <input type="hidden" name="products[${productId}][price]" value="${price}">
        `;
        hiddenContainer.appendChild(hiddenRow);

        // Update total and balance
        updateTotal(totalPrice);

        // Remove button
        row.querySelector(".remove-btn").addEventListener("click", function() {
            tableBody.removeChild(row);
            hiddenContainer.removeChild(hiddenRow);
            updateTotal(-totalPrice);
        });

        // Reset inputs
        productSelect.selectedIndex = 0;
        quantityInput.value = "";
    });

    // Update balance when paid amount changes
    paidInput.addEventListener("input", updateBalance);

    // AJAX Form Submission
    document.getElementById('invoiceForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const form = this;
        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                'Accept': 'application/json',
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                successAlert.innerText = "Invoice created successfully!";
                successAlert.style.display = "block";

                // Clear table, hidden inputs, total, balance
                tableBody.innerHTML = '';
                hiddenContainer.innerHTML = '';
                totalElement.innerText = '0.00';
                balanceElement.innerText = '0.00';
                balanceElement.style.color = 'black';

                // Reset inputs
                document.getElementById('customerSelect').selectedIndex = 0;
                document.getElementById('productSelect').selectedIndex = 0;
                document.getElementById("quantityInput").value = '';
                paidInput.value = '';
                document.getElementById('paymentMethod').selectedIndex = 0;

                setTimeout(() => { successAlert.style.display = "none"; }, 3000);
            } else {
                alert('Something went wrong!');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
    });
});
</script>
@endpush