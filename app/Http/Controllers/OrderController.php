<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;

class OrderController extends Controller {

    public function order() {
        $products = DB::table('cart')
                ->join('products', 'cart.product_id', '=', 'products.id')
                ->where('cart.user_id', '=', session('user')->id)
                ->select(DB::raw('products.*,count(*) as quantity,cart.id as cart_id'))
                ->groupBy('product_id')
                ->get();
        $userInformation = User::find(session()->get('user')->id);
        return view('order', ['products' => $products, 'userInformation' => $userInformation]);
    }

    public function confirmOrder(Request $request) {
        $order = new Order;
        $order->user_id = session()->get('user')->id;
        $order->address = $request->customer_address;
        $order->order_status = 'Pending';
        $order->payment_status = 'Pending';
        $order->payment_method = $request->payment_method;
        $order->save();
        $order_id = $order->id;
        $data = array();
        $cartData = DB::table('cart')
                ->join('products', 'cart.product_id', '=', 'products.id')
                ->where('cart.user_id', '=', session('user')->id)
                ->select(DB::raw('products.*,count(*) as quantity'))
                ->groupBy('product_id')
                ->get();
        foreach ($cartData as $cD) {
            $data[] = array(
                'order_id' => $order_id,
                'product_id' => $cD->id,
                'product_name' => $cD->name,
                'quantity' => $cD->quantity,
                'price' => $cD->price
            );
        }
        $insert = OrderDetail::insert($data);
        if ($insert) {
            DB::table('cart')->where('user_id', '=', session()->get('user')->id)->delete();
            return redirect('/');
        }
    }

    public function orderList() {
        $data = DB::table('orders')
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->where('orders.user_id', '=', session('user')->id)
                ->select(DB::raw('orders.*,users.name,users.email,(select sum(price*quantity) from order_details where order_id=orders.id) as total_price'))
                ->get();
        return view('orderList', ['data' => $data]);
    }

    public function orderDetails($id) {
        $order=DB::table('orders')
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->where('orders.id', '=', $id)
                ->select(DB::raw('orders.*,users.name,users.email'))
                ->get();
        $products = OrderDetail::where('order_id','=',$id)->get();
        return view('orderDetails', ['products' => $products, 'order' => $order]);
    }

}
