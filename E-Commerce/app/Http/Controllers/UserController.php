<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Order_item;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        $profile = Auth()->user();
        return view('User.dashboard', ['profile' => $profile]);
    }
    public function profile() {
        $profile = Auth()->user();
        return view('User.profile.index')->with('profile', $profile);
    }
    public function profile_edit() {
        $profile = Auth()->user();
        return view('User.profile.edit')->with('profile', $profile);
    }
    public function update(Request $request, $id) {
        // dd($request->all());
        $validate = $request->validate([
            'email'     => 'required|email',
            'name' => 'required|min:5',
            'phone' => 'required|min:10',
            'address' => 'required|min:5',
            'image' => 'required|mimes:png,jpeg,jpg|max:2048',
        ]);

        $find = User::find($id);

        $foto = $request->file('image');
        if($foto) {
            $filename = date('Y-m-d-').$foto->getClientOriginalName();
            $path = 'foto-user/'.$filename;
            
            if($find->image) {
                Storage::disk('public')->delete('foto-user/' . $find->image);
            }
            Storage::disk('public')->put($path, file_get_contents($foto));
            $validate['image'] = $filename;
        }

        User::whereId($id)->update($validate);
        
        return redirect()->route('user.profile');
    }
    public function history() {
        $profile = Auth()->user();
        $order = Order::where('user_id', Auth::user()->id)->orderBy('id', 'Desc')->get()->toArray();
        return view('User.order.history', ['title' => 'history', 'profile' => $profile])->with(compact('order'));
    }
    public function history_detail($id) {
        $orders=Order_item::where('order_id', $id)->get();
        $profile = Auth()->user();
        return view('user.order.list-order', ['profile' => $profile, 'title' => 'order list' ])->with('orders', $orders);
    }
    public function pesanan() {
        $order = Order::where('user_id', Auth::user()->id)->orderBy('id', 'Desc')->get()->toArray();
        $profile = Auth()->user();
        return view('User.order.history', ['title' => 'orders', 'profile' => $profile])->with(compact('order'));
    }
}
