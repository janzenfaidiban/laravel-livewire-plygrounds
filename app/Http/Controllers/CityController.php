<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Shop;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $collection = City::with('country', 'shops')->get();
        return view('city.index', compact('collection'));
    }

    public function shops()
    {
        return $this->has(Shop::class);
    }
}
