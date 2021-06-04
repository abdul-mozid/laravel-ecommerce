<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller {

    public function index() {
        return view('products');
    }

    public function details($id) {
        $product = Product::find($id);
        return view('productDetails', ['product' => $product]);
    }

    public function search(Request $req) {
        $products = Product::where('name', 'like', '%' . $req->input('search_query') . '%')->get();
        return view('productSearch', ['products' => $products]);
    }

    public function addToCart(Request $request) {
        if ($request->session()->has('user')) {
            $cart = new Cart;
            $cart->product_id = $request->product_id;
            $cart->user_id = $request->session()->get('user')->id;
            $save = $cart->save();
            if ($save) {
                return back();
            }
        } else {
            return redirect('/login');
        }
    }

    static function cartItem() {
        $user_id = session('user')->id;
        return Cart::where('user_id', '=', $user_id)->count();
    }

    public function viewCart() {
        $products = DB::table('cart')
                ->join('products', 'cart.product_id', '=', 'products.id')
                ->where('cart.user_id', '=', session('user')->id)
                ->select(DB::raw('products.*,count(*) as quantity,cart.id as cart_id'))
                ->groupBy('product_id')
                ->get();
        return view('cart', ['products' => $products]);
    }
    public function removeCartProduct($id){
        $product=Cart::find($id);
        $product->delete();
        return redirect('/viewCart');
    }

}
