<?php

namespace App\Http\Controllers\Admin;

use App\Models\Unit;
use App\Models\User;
use App\Models\Order;
use App\Models\Driver;
use App\Models\SubCat;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\ProductCategory;

class HomeController
{
    public function index()
    {
       $data=User::with(['roles'])->where('id',2)->get();
        //  dd($data1);
        $data2=Driver::all();
        // dd($data2);
         $data1=ProductCategory::all();
        //   dd($data1);
        $data3=Product::all();
        // dd($data3);
        $data4=Vendor::all();
    //    dd($data);
    $data5=SubCat::all();
    // dd($data5);
    $data6=Unit::all();

    $data7=Order::all();
        return view('home',compact('data','data1','data2','data3','data4',
    'data5','data6','data7'));
    }
}
