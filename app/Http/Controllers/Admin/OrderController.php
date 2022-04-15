<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOrderRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Driver;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::with(['products', 'driver', 'customer'])->get();
        // dd($orders);
           $orders1=Order::with(['products', 'driver', 'customer'])->where('order_status',1)->get();
        //    dd($orders);
        return view('admin.orders.index', compact('orders','orders1'));
    }
    // order_cancel
    public function order_cancel()
    {
        abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        // dd($orders);
           $orders=Order::with(['products', 'driver', 'customer'])->where('order_status',0)->get();
        //    dd($orders);
        return view('admin.orders.cancel', compact('orders'));
    }
    public function order_pending()
    {
        abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        // dd($orders);
           $orders=Order::with(['products', 'driver', 'customer'])->where('order_status',1)->get();
        //    dd($orders);
        return view('admin.orders.pending', compact('orders'));
    }
    public function order_confirmed()
    {
        abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        // dd($orders);
           $orders=Order::with(['products', 'driver', 'customer'])->where('order_status',2)->get();
        //    dd($orders);
        return view('admin.orders.confirmed', compact('orders'));
    }
    public function order_in_process()
    {
        abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        // dd($orders);
           $orders=Order::with(['products', 'driver', 'customer'])->where('order_status',3)->get();
        //    dd($orders);
        return view('admin.orders.in_process', compact('orders'));
    }
    public function order_ready_delivery()
    {
        abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        // dd($orders);
           $orders=Order::with(['products', 'driver', 'customer'])->where('order_status',4)->get();
        //    dd($orders);
        return view('admin.orders.ready_delivery', compact('orders'));
    }
    public function order_item_way()
    {
        abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        // dd($orders);
           $orders=Order::with(['products', 'driver', 'customer'])->where('order_status',5)->get();
        //    dd($orders);
        return view('admin.orders.item_way', compact('orders'));
    }
    public function order_delivered()
    {
        abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        // dd($orders);
           $orders=Order::with(['products', 'driver', 'customer'])->where('order_status',6)->get();
        //    dd($orders);
        return view('admin.orders.delivered', compact('orders'));
    }

    public function create()
    {
        abort_if(Gate::denies('order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id');

        $drivers = Driver::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.orders.create', compact('customers', 'drivers', 'products'));
    }

    public function store(StoreOrderRequest $request)
    {
        //  $order = Order::create($request->all());
        $order=Order::create([
            'st_date'=>$request->st_date,

            // 'order_status'=>$request->order_status,
            // dd($request->all()),

            'order_type'=>$request->order_type,
            'quantity'=>$request->quantity,
            'payment'=>$request->payment,
            'status'=>$request->status,


        ]);
        //  dd($order);
        $order->order_status=$request->order_status;
                //  dd($request->all());
        $order->save();
        $order->products()->sync($request->input('products', []));
        return redirect()->route('admin.orders.index');
    }

    public function edit(Order $order)
    {
        abort_if(Gate::denies('order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id');

        $drivers = Driver::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $order->load('products', 'driver', 'customer');

        return view('admin.orders.edit', compact('customers', 'drivers', 'order', 'products'));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->all());
        $order->products()->sync($request->input('products', []));

        return redirect()->route('admin.orders.index');
    }

    public function show(Order $order)
    {
        abort_if(Gate::denies('order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->load('products', 'driver', 'customer');

        return view('admin.orders.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        abort_if(Gate::denies('order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrderRequest $request)
    {
        Order::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
