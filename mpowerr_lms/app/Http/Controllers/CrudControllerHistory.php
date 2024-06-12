<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudControllerHistory extends Controller
{
    function DeleteLeasesMethod(Request $request){

        // Get the leaseId ID from the request
        $leaseId = $request->id;

        // Delete the leaseId record from the database
        DB::table('lease_details')->where('id', $leaseId)->delete();

        // Redirect back to the previous page or any other desired page
        return redirect()->back()->with('success', 'lease deleted successfully!');
  }
}
