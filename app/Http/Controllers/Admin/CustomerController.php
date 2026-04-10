<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerFormRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->get();
        return view('admin.customer.index', compact('customers'));
    }


    public function create()
    {

        return view('admin.customer.create');
    }

    public function edit($customers_id)

    {

        $customers = Customer::find($customers_id);

        return view('admin.customer.edit', compact('customers',));
    }


    public function store(CustomerFormRequest $request)
    {

        $data = $request->validated();
        Customer::create($data);
        return redirect('admin/customers/view')->with('status', 'Customer Created');
    }

    public function update(CustomerFormRequest $request, $customers_id)

    {
        $customer = Customer::find($customers_id);

       $customer->update($request->only(['firstname','lastname','telephone','city']));

        return redirect('admin/customers/view')->with('status', 'Customer Updated');
    }

      public function destroy($customers_id)
    {
        $customer = Customer::findOrFail($customers_id);
        $customer->delete();

        return redirect()->back()->with('success', 'Customer deleted successfully!');
    }
}
