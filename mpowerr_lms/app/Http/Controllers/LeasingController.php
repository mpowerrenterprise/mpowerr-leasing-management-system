<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Lease;

class LeaseController extends Controller
{
    public function showForm()
    {
        $customers = Customer::all();
        $products = Product::all();
        $leases = Lease::all();

        return view('lease_form', compact('customers', 'products', 'leases'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nic_no' => 'required|string',
            'p_id' => 'required|integer',
            'price' => 'required|numeric',
            'installment' => 'required|integer',
            'm_due' => 'required|numeric',
            'date' => 'required|date',
        ]);

        Lease::create($request->all());

        return redirect()->back()->with('success', 'Lease created successfully!');
    }
}
