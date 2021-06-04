<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller {

    public function dashboard() {
        $data['products'] = Product::all()->count();
        $data['users'] = User::all()->count();
        $data['orders'] = Order::all()->count();
        $data['totalSales'] = OrderDetail::select(DB::raw('sum(price * quantity) as total'))->get()->first();
        $data['chartData'] = DB::select(DB::Raw('SELECT *,SUM(sale) AS total_sale FROM (SELECT id,DATE(created_at) AS order_date,(SELECT SUM(price*quantity) FROM `order_details` WHERE order_id=orders.id) AS sale  FROM `orders`) AS a GROUP BY order_date'));
        return view('admin.dashboard', ['data' => $data]);
    }

    public function productList() {
        $products = Product::all();
        return view('admin.products', ['products' => $products]);
    }

    public function addProduct() {
        return view('admin.productAdd');
    }

    public function saveProduct(Request $req) {
        $product = new Product;
        $product->name = $req->name;
        $product->category = $req->category;
        $product->price = $req->price;
        $product->gallery = $req->gallery;
        $product->description = $req->description;
        $save = $product->save();
        if ($save) {
            return redirect('products');
        }
    }

    public function editProduct($id) {
        $data = Product::find($id);
        return view('admin.productEdit', ['data' => $data]);
    }

    public function updateProduct(Request $req) {
        $product = Product::find($req->id);
        $product->name = $req->name;
        $product->category = $req->category;
        $product->price = $req->price;
        $product->gallery = $req->gallery;
        $product->description = $req->description;
        $save = $product->save();
        if ($save) {
            return redirect('products');
        }
    }

    public function deleteProduct($id) {
        $delete = Product::find($id)->delete();
        if ($delete) {
            return redirect('products');
        }
    }

    public function userList() {
        $users = User::all();
        return view('admin.users', ['users' => $users]);
    }

    public function addUser() {
        return view('admin.userAdd');
    }

    public function saveUser(Request $req) {
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->is_active = 1;
        $save = $user->save();
        if ($save) {
            return redirect('users');
        }
    }

    public function editUser($id) {
        $data = User::find($id);
        return view('admin.userEdit', ['data' => $data]);
    }

    public function updateUser(Request $req) {
        $user = User::find($req->id);
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->is_active = $req->is_active;
        $save = $user->save();
        if ($save) {
            return redirect('users');
        }
    }
    public function deleteUser($id) {
        $delete = User::find($id)->delete();
        if ($delete) {
            return redirect('users');
        }
    }
    public function orderList() {
        $orders = DB::table('orders')
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->select(DB::raw('orders.*,users.name,users.email,(select sum(price*quantity) from order_details where order_id=orders.id) as total_price'))
                ->get();
        return view('admin.orders', ['orders' => $orders]);
    }
    public function approveOrder($id) {
        $order = Order::find($id);
        $order->order_status = 'Approved';
        $save = $order->save();
        if ($save) {
            return redirect('orders');
        }
    }
    public function approvePayment($id) {
        $order = Order::find($id);
        $order->payment_status = 'Approved';
        $save = $order->save();
        if ($save) {
            return redirect('orders');
        }
    }

}
