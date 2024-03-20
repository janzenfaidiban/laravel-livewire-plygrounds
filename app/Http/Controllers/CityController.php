<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Shop;
use Eelcol\LaravelBootstrapAlerts\Facade\BootstrapAlerts;
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

    public function create()
    {
        return view('city.create');
    }

    public function store(Request $request)
    {
        return ([
            'name' => $request->name,
            'adddress' => $request->adddress,
            'coordinates' => $request->coordinates,
            'coordinatesUrl' => $request->coordinatesUrl,
        ]);
    }

    public function edit($id)
    {
        $item = City::find($id);
        return view('city.edit', compact('item'));
    }

    public function update(Request $request)
    {
        return ([
            'id' => $request->id,
            'name' => $request->name,
            'adddress' => $request->adddress,
            'coordinates' => $request->coordinates,
            'coordinatesUrl' => $request->coordinatesUrl,
        ]);
    }

    public function delete($id)
    {
        $item = City::find($id);
        $item->delete();
        return redirect()->back()->with(BootstrapAlerts::addError('Deleted! Data has been deleted'));
    }
}
