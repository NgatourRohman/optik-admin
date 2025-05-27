<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::latest()->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('orders.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_name' => 'required',
            'customer_address' => 'required',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $total = 0;
        foreach ($data['items'] as &$item) {
            $product = Product::find($item['product_id']);
            $item['price'] = $product->price;
            $total += $product->price * $item['quantity'];
        }

        $order = Order::create([
            'customer_name' => $data['customer_name'],
            'customer_address' => $data['customer_address'],
            'total_price' => $total,
            'status' => 'baru'
        ]);

        foreach ($data['items'] as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order->load('items.product'); // eager load relasi produk
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:baru,diproses,selesai',
        ]);

        $order->status = $request->status;
        $order->save();

        return redirect()->route('orders.show', $order)->with('success', 'Status berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
