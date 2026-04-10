<?php

namespace App\Http\Controllers\admin;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class InvoiceController extends Controller
{
    public function index()
    {

        $products = Product::latest()->get();
        $customers = Customer::latest()->get();

        return view('admin.invoice.create', compact('products', 'customers'));
    }


    public function list()
    {
        $invoices = Invoice::with('customer')->latest()->get();
        return view('admin.invoice.list', compact('invoices'));
    }

    public function show(Invoice $invoice)
    {
        $invoice->load('customer', 'products'); // eager load related data
        return view('admin.invoice.show', compact('invoice'));
    }



    public function exportPdf(Invoice $invoice)
    {
        $invoice->load('customer', 'products');

        $pdf = Pdf::loadView('admin.invoice.pdf', compact('invoice'));
        return $pdf->download('invoice_' . $invoice->id . '.pdf');
    }


    public function store(Request $request)
    {
        try {

            DB::transaction(function () use ($request) {

                $total = 0;

                $invoice = Invoice::create([
                    'customer_id' => $request->customer_id,
                    'total' => 0,
                ]);

                foreach ($request->products as $prod) {

                    $product = Product::where('id', $prod['product_id'])
                        ->lockForUpdate()
                        ->firstOrFail();

                    if ($product->quantity < $prod['quantity']) {
                        throw new \Exception("Not enough stock for {$product->name}");
                    }

                    $subtotal = $product->price * $prod['quantity'];
                    $total += $subtotal;

                    $invoice->products()->attach($product->id, [
                        'quantity' => $prod['quantity'],
                        'price' => $product->price
                    ]);

                    $product->decrement('quantity', $prod['quantity']);
                }

                $invoice->update(['total' => $total]);
            });

            return response()->json([
                'success' => true,
                'message' => 'Invoice created successfully'
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }


    public function delete(Invoice $invoice)

    {
        $invoice->delete();

        return redirect()->back()->with('success', 'Invoice deleted successfully!');
    }
}
