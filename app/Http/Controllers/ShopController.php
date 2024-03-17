<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $collection = Shop::with('city')->get();
        return view('shop.index', compact('collection'));
    }
}
