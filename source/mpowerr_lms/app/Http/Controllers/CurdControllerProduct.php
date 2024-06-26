<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurdControllerProduct extends Controller
{
    function RegisterProductMethod(Request $request){

        // Validate the form data
        $request->validate([
            'p_name' => 'required|string',
            's_rate' => 'required|integer',
            'b_rate' => 'required|integer',
            'p_id' => 'required|integer',
            'p_quantity' => 'required|integer',
            'p_model' => 'required|string',
        ]);

        // Insert data into the database
        DB::table('product_details')->insert([
            'p_name' => $request->input('p_name'),
            's_rate' => $request->input('s_rate'),
            'b_rate' => $request->input('b_rate'),
            'p_id' => $request->input('p_id'),
            'p_quantity' => $request->input('p_quantity'),
            'p_model' => $request->input('p_model'),
        ]);

        // Redirect the user after successful registration
        return redirect()->back()->with('success', 'Product registered successfully!');
        if ($affected) {
            // Redirect back with success message
            return redirect()->route("ProductManagementRoute")->with('success', 'Product information updated successfully!');
        } else {
            // Product not found, redirect back with error message
            return redirect()->route("ProductManagementRoute")->with('error', 'product not found!');
        }
    }

    function EditProductViewMethod(Request $request){

        $ProductId = $request->id;
        $Product = DB::table('Product_details')->where('id', $ProductId)->first();
        return view('ProductManagementEditForm', ['Product' => $Product]);
    }

    function EditProductMethod(Request $request){
        // Validate the form data
        $request->validate([
            'id' => 'required|integer', // Validation rule for the Product ID
            'p_name' => 'required|string',
            's_rate' => 'required|integer',
            'b_rate' => 'required|integer',
            'p_id' => 'required|integer',
            'p_quantity' => 'required|integer',
            'p_model' => 'required|string',


        ]);

        // Update Product data in the database
        $affected = DB::table('Product_details')
                        ->where('id', $request->id)
                        ->update([
                            'p_name' => $request->input('p_name'),
                            's_rate' => $request->input('s_rate'),
                            'b_rate' => $request->input('b_rate'),
                            'p_id' => $request->input('p_id'),
                            'p_quantity' => $request->input('p_quantity'),
                            'p_model' => $request->input('p_model'),
                        ]);

        if ($affected) {
            // Redirect back with success message
            return redirect()->route("ProductManagementRoute")->with('success', 'Product information updated successfully!');
        } else {
            // Product not found, redirect back with error message
            return redirect()->route("ProductManagementRoute")->with('error', 'Product not found!');
        }
    }

    function DeleteProductMethod(Request $request){

        // Get the Product ID from the request
        $ProductId = $request->id;

        // Delete the Product record from the database
        DB::table('Product_details')->where('id', $ProductId)->delete();

        // Redirect back to the previous page or any other desired page
        return redirect()->back()->with('success', 'Product deleted successfully!');
  }
}

