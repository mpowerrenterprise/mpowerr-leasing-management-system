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

    public function PayInstallmentMethod(Request $request)
    {
        $lease_id = $request->id;

        // Update the installment count in the lease_details table
        $affected = DB::table('lease_details')
            ->where('id', $lease_id)
            ->decrement('installment', 1);

            if ($affected) {
                // Check if installment became zero
                $updatedInstallment = DB::table('lease_details')
                    ->where('id', $lease_id)
                    ->value('installment');

                if ($updatedInstallment == 0) {
                    // If installment became zero, fetch lease details and add them to history table
                    $lease = DB::table('lease_details')
                        ->select('nic_no', 'p_id', 'price')
                        ->where('id', $lease_id)
                        ->first();

                    DB::table('history')->insert([
                        'nic_no' => $lease->nic_no,
                        'p_id' => $lease->p_id,
                        'price' => $lease->price,
                        // You can add more fields here if needed
                    ]);
                }

                // If at least one row was affected, it means the update was successful
                return redirect()->back()->with('success', 'Installment count reduced successfully.');
            } else {
                // If no row was affected, it means the record with the provided ID was not found
                return redirect()->back()->with('error', 'Lease detail not found.');
            }

    }

}
