<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Installment;

class InstallmentController extends Controller
{
    public function payInstallment(Request $request)
    {
        // Assuming you have a way to identify which installment to reduce
        // For example, you might pass an installment ID through a hidden input in the form

        // $installmentId = $request->input('installment_id');
        // $installment = Installment::find($installmentId);

        // For simplicity, let's assume we're working with a hardcoded installment ID
        $installmentId = 1; // Replace this with actual logic to identify the installment
        $installment = Installment::find($installmentId);

        if ($installment) {
            // Reduce the installment number
            $installment->number -= 1;
            $installment->save();
        }

        // Redirect back or to a specific route with a success message
        return redirect()->back()->with('success', 'Installment number reduced successfully!');
    }
}
