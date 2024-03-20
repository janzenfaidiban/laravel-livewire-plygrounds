<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Eelcol\LaravelBootstrapAlerts\Facade\BootstrapAlerts;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $collection = Shop::with('city')->get();
        return view('shop.index', compact('collection'));
    }

    public function create()
    {
        return view('shop.create');
    }

    public function store(Request $request)
    {
        return ([
            'name' => $request->name,
        ]);
    }

    public function edit($id)
    {
        $item = Shop::find($id);
        return view('shop.edit', compact('item'));
    }

    public function update(Request $request)
    {
        return ([
            'id' => $request->id,
            'name' => $request->name,
        ]);
    }

    public function delete($id)
    {
        $item = Shop::find($id);
        $item->delete();
        return redirect()->back()->with(BootstrapAlerts::addError('Deleted! Data has been deleted'));
    }
}
