<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Lease;

class LeasingController extends Controller
{
    public function LeasesManagementPage()
    {
        $customers = Customer::all();
        $products = Product::all();
        $leases = Lease::all();

        return view('LeasesManagementPage', compact('customers', 'products', 'leases'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nic_no' => 'required|exists:customers,nic_no',
            'p_id' => 'required|exists:products,id',
            'price' => 'required|numeric',
            'installment' => 'required|numeric|min:1',
            'm_due' => 'required|numeric',
            'date' => 'required|date',
        ]);

        Lease::create($request->all());

        return redirect()->route('LeasesManagementPage')->with('success', 'Lease created successfully!');
    }
}
