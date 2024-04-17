<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    public function index()
    {
        // show data
        $profile = Auth()->user();
        $products = Product::orderBy('id', 'DESC')->get();

        return view('Admin.products.index',[
            'products' => $products,
            "title" => 'product',
            'profile' => $profile,
         ]);
    }
    public function store(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required|min:5',
                'slug' => 'required|unique:products',
                'quantity' => 'required',
                'price' => 'required',
                'description' => 'required',
                'image' => 'required|files|max:2048',
            ]);
            
            $store = new Product;
            $store->name = $request->name;
            // $store->slug = $request->slug;
            $store->slug = Str::slug($request->name);
            $store->quantity = $request->quantity;
            $store->price = $request->price;
            $store->description = $request->description;

            $filename = date('Y-m-d').'-'.$request->slug.'.'.$request->image->getClientOriginalExtension();
            $request->image->move('storage/foto-product/', $filename);
            $store->image = $filename;

            $store->save();

            return ['status' => true, 'pesan' => 'Product Berhasil Ditambahkan'];
        } catch(\Exception $e){
            return ['status' => false, 'error' => $e->getMessage()];
        }
    }
    public function edit($id)
    {
        $product = Product::find($id);
        if($product)
        {
            return response()->json([
                'status' => 200,
                'product' => $product,
            ]);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'message' => 'gak ada nih'
            ]);
        }
    }
    public function update(Request $request,$id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'slug' => 'required',
                'quantity' => 'required',
                'price' => 'required',
                'description' => 'required',
                'image' => 'file|max:2048',
            ]);

            $find = Product::find($id);
            
            $find->name = $request->name;
            $find->slug = $request->slug;
            $find->quantity = $request->quantity;
            $find->price = $request->price;
            $find->description = $request->description;
            
            $filename = date('Y-m-d').'-'.$request->slug.'.'.$request->image->getClientOriginalExtension();
            $request->image->move('storage/foto-product/', $filename);
            $find->image = $filename;
            
            $find->save();
            
            return ['status' => true, 'pesan' => 'Product Berhasil Diupdate'];
        } catch(\Exception $e) {
            return ['status' => false, 'error' => $e->getMessage()];
        }
        // dd($request->image);
    }
    public function destroy(Product $id)
    {
        $data = Product::find($id);
        Product::destroy($data);
        return redirect()->route('admin.products');
    }

}