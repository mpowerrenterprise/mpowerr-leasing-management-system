<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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


    function index(){

        $Product = DB::table('lease_details')->get();
        return view("ProductManagement", ['Leases' => $lease]);

    }
}
