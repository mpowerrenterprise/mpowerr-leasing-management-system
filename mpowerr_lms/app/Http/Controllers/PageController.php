<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Lease;



class PageController extends Controller
{
    function IndexPage(){

        return view("index");
    }

    function CustomerManagementPage(){

        $Customers = DB::table('Customer_details')->get();
        return view("CustomerManagement", ['Customers' => $Customers]);

    }

    function ProductManagementPage(){

        $Product = DB::table('Product_details')->get();
        return view("ProductManagement", ['Products' => $Product]);

    }


    function LeasesManagementPage(){

        $customers = DB::table('customer_details')->select('nic_no', 'name')->get();
        $products = DB::table('product_details')->select('id', 'p_name', 's_rate')->get();
        $leases = DB::table('lease_details')->select('nic_no', 'p_id', 'price', 'installment', 'm_due')->get();
        return view("LeasesManagement", ['customers' => $customers, 'products' => $products, 'leases' => $leases]);

    }
}
