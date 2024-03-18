<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        return view('country.index');
    }

    public function show($id)
    {
        $item = Country::where('id', $id)->first();
        return view('country.show', compact('item'));
    }

    public function create()
    {
        // return view('country.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        // return view('country.edit');
    }

    public function update(Request $request)
    {
        //
    }

    public function delete($id)
    {
        //
    }
}
