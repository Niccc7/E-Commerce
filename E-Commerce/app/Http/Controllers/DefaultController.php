<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Order_item;
use Carbon\Carbon;

class DefaultController extends Controller
{
    public function index()
    {
        $product = Product::where('quantity', '>', 0)
            ->orderBy('quantity', 'DESC')
            ->paginate(8);
        return view('home', [
            'products' => $product
        ]);
    }
    public function product()
    {
        $product = Product::where('quantity', '>', 0)
            ->orderBy('quantity', 'DESC')
            ->paginate(8);
        return view(
            'product',
            [
                'title' => 'product',
                'products' => $product
            ]
        );
    }
    public function product_detail($slug)
    {
        $product = Product::where('slug', $slug)->first();

        return view('product-detail', ['product' => $product]);
    }
    public function about() {
        return view('about');
    }
    public function cart()
    {
        $user = Auth()->user();
        return view('cart', ['user' => $user]);
    }
    public function addToCart($id)
    {
        $product = Product::find($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
        session()->put('cart', $cart);
        
        return redirect()->back()->with('success', 'Product has been added to cart!');
    }
    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Product Quantity has been updated!');
        }
    }
    public function deleteProduct(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
                session()->flash('success', 'Product has been deleted from cart!');
            }
        }
    }
    public function checkoutCart(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'subtotal' => 'required|integer',
        ]);

        // Get the authenticated user
        $user = User::find(Auth::id());

        // Calculate tax and total values
        $tax = 0.10; // set tax rate to 10%
        $total = $request->subtotal + ($request->subtotal * $tax);
        
        $order = new Order();
        $order->user_id = $user->id;
        $order->subtotal = $request->subtotal;
        $order->tax = $tax * 100;
        $order->total = $total;
        $order->status_order = 'done';
        $order->delivered_date = Carbon::now();
        $order->created_at = Carbon::now();
        $order->save();

        foreach (session('cart') as $id => $details) {
            $product = Product::find($id);
            $orderDetail = new Order_item();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $id;
            $orderDetail->price = $product->price;
            $orderDetail->quantity = $details['quantity'];
            $orderDetail->save();

            //  Decrease the quantity of the product
            $product->quantity -= $details['quantity'];
            $product->save();
        }
        // Hapus session cart
        session()->forget('cart');

        return redirect()->route('success');
    }
    public function success () {
        return view('success');
    }
}