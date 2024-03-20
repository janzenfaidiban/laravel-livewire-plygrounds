<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $collection = Country::with('shops', 'cities')->get();
        return view('country.index', compact('collection'));
    }

    public function show($id)
    {
        $item = Country::where('id', $id)->first();
        return view('country.show', compact('item'));
    }

    public function create()
    {
        return view('country.create');
    }

    public function store(Request $request)
    {
        return ([
            'name' => $request->name,
            'flag' => $request->flag,
        ]);
    }

    public function edit($id)
    {
        return view('country.edit');
    }

    public function update(Request $request)
    {
        return ([
            'id' => $request->id,
            'name' => $request->name,
            'flag' => $request->flag,
        ]);
    }

    public function delete($id)
    {
        //
    }
}
