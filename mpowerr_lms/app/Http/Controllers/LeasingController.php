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

    function PayInstallmentMethod(Request $request){

        $lease_id = $request->id;

            // Update the installment count in the lease_details table
        $affected = DB::table('lease_details')
        ->where('id', $lease_id)
        ->decrement('installment', 1);

        if ($affected) {
            // Check if the installment count has reached zero
            $leaseDetail = DB::table('lease_details')->where('id', $lease_id)->first();

            if ($leaseDetail->installments == 0) {
                // Move the record to the history table
                DB::table('lease_details_history')->insert([
                    'original_id' => $leaseDetail->id,
                    'installments' => $leaseDetail->installments,
                    // Add other columns as needed
                    'created_at' => now(),
                    'updated_at' => now()
                ]);

                // Delete the record from the original table
                DB::table('lease_details')->where('id', $lease_id)->delete();

                return redirect()->back()->with('success', 'Installment count reduced to zero and moved to history successfully.');
            }

        if ($affected) {
        // If at least one row was affected, it means the update was successful
             return redirect()->back()->with('success', 'Installment count reduced successfully.');
        } else {
        // If no row was affected, it means the record with the provided ID was not found
         return redirect()->back()->with('error', 'Lease detail not found.');
        }
    }
}

public function ShowLeaseDetails()
{
    $leaseDetails = DB::table('lease_details')->get();
    return view('lease_details', ['leaseDetails' => $leaseDetails]);
}

}
