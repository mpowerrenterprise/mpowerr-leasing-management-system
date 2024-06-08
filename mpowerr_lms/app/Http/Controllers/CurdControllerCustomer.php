<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurdControllerCustomer extends Controller
{
    function RegisterCustomerMethod(Request $request){

        // Validate the form data
        $request->validate([
            'name' => 'required|string',
            'age' => 'required|integer',
            'email' => 'required|string',
            'gender' => 'required|in:male,female,other',
            'grade' => 'required|integer',
            'address' => 'required|string',
            'mobile_no' => 'required|integer',
            'nic_no' => 'required|integer',
        ]);

        // Insert data into the database
        DB::table('Customer_details')->insert([
            'name' => $request->input('name'),
            'age' => $request->input('age'),
            'email' => $request->input('email'),
            'gender' => $request->input('gender'),
            'grade' => $request->input('grade'),
            'address' => $request->input('address'),
            'mobile_no' => $request->input('mobile_no'),
            'nic_no' => $request->input('nic_no'),
        ]);

        // Redirect the user after successful registration
        return redirect()->back()->with('success', 'Customer registered successfully!');
        if ($affected) {
            // Redirect back with success message
            return redirect()->route("CustomerManagementRoute")->with('success', 'Customer information updated successfully!');
        } else {
            // Customer not found, redirect back with error message
            return redirect()->route("CustomerManagementRoute")->with('error', 'Customer not found!');
        }
    }

    function EditCustomerViewMethod(Request $request){

        $CustomerId = $request->id;
        $Customer = DB::table('Customer_details')->where('id', $CustomerId)->first();
        return view('CustomerManagementEditForm', ['Customer' => $Customer]);
    }

    function EditCustomerMethod(Request $request){
        // Validate the form data
        $request->validate([
            'id' => 'required|integer', // Validation rule for the Customer ID
            'name' => 'required|string',
            'age' => 'required|integer',
            'email' => 'required|string',
            'gender' => 'required|in:male,female,other',
            'grade' => 'required|integer',
            'address' => 'required|string',
            'mobile_no' => 'required|integer',
            'nic_no' => 'required|integer',

        ]);

        // Update Customer data in the database
        $affected = DB::table('Customer_details')
                        ->where('id', $request->id)
                        ->update([
                            'name' => $request->input('name'),
                            'age' => $request->input('age'),
                            'email' => $request->input('email'),
                            'gender' => $request->input('gender'),
                            'grade' => $request->input('grade'),
                            'address' => $request->input('address'),
                            'mobile_no' => $request->input('mobile_no'),
                            'nic_no' => $request->input('nic_no'),
                        ]);

        if ($affected) {
            // Redirect back with success message
            return redirect()->route("CustomerManagementRoute")->with('success', 'Customer information updated successfully!');
        } else {
            // Customer not found, redirect back with error message
            return redirect()->route("CustomerManagementRoute")->with('error', 'Customer not found!');
        }
    }

    function DeleteCustomerMethod(Request $request){

        // Get the Customer ID from the request
        $CustomerId = $request->id;

        // Delete the Customer record from the database
        DB::table('Customer_details')->where('id', $CustomerId)->delete();

        // Redirect back to the previous page or any other desired page
        return redirect()->back()->with('success', 'Customer deleted successfully!');
  }

}
