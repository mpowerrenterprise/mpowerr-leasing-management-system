<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Lease;
use Illuminate\Support\Facades\DB;

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
        ]);

        Lease::create($request->all());

        return redirect()->route('LeasesManagementPage')->with('success', 'Lease created successfully!');
    }

    function RegisterLeasesMethod(Request $request){

        // Validate the form data
        $request->validate([
            'nic_no' => 'required|string',
            'p_id' => 'required|integer',
            'installment' => 'required|integer',
            'price' => 'required|integer',
            'm_due' => 'required|string',
        ]);

        // Insert data into the database
        DB::table('lease_details')->insert([
            'nic_no' => $request->input('nic_no'),
            'p_id' => $request->input('p_id'),
            'installment' => $request->input('installment'),
            'price' => $request->input('price'),
            'm_due' => $request->input('m_due'),
        ]);

        // Redirect the user after successful registration
        return redirect()->back()->with('success', 'Lease registered successfully!');
        if ($affected) {
            // Redirect back with success message
            return redirect()->route("LeasesManagementRoute")->with('success', 'Leases information updated successfully!');
        } else {
            // Product not found, redirect back with error message
            return redirect()->route("LeasesManagementRoute")->with('error', 'Leases not found!');
        }
    }
}
