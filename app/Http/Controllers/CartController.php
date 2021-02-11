<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Auth;

class CartController extends Controller
{
    public function index() {
        $carts = Cart::with(['product.galleries','user'])->where('users_id', Auth::user()->id)->get();
        return view('pages.cart',compact('carts'));
    }

    public function delete(Request $request, $id) {
        
        $data = Cart::findOrFail($id);
        $data->delete();
        return redirect()->route('cart');
    }

    public function success() {
        return view('pages.success');
    }
}
