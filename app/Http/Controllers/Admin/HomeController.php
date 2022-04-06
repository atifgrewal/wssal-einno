<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Driver;
use App\Models\Product;
use App\Models\ProductCategory;

class HomeController
{
    public function index()
    {
        $data=User::with(['roles'])->where('id',2)->get();
        //  $data1=User::with(['drivers'])->where('id',4)->get();
        //  dd($data1);
        $data2=Driver::all();
        // dd($data2);
         $data1=ProductCategory::all();
        //   dd($data1);
        $data3=Product::all();
        // dd($data3);
        return view('home',compact('data','data1','data2','data3'));
    }
}
