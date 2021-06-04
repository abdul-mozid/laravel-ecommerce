<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
        $data=Product::all();
        return view('home',['data'=>$data]);
    }
}
