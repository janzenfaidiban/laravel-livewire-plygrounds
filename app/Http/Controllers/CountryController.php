<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Eelcol\LaravelBootstrapAlerts\Facade\BootstrapAlerts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $collection =Country::with('shops', 'cities')
        ->when(strlen($request->s) > 0, function ($query) use ($request){
            $query->where('name', 'LIKE', "%$request->s%");
        })
        ->get();
        return view('country.index', compact('collection','request'));
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
        $validator = FacadesValidator::make(
            $request->all(),
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'Name is a required field',
            ]
        );


        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        } else {
            try {
                $data = new Country();

                $data->name = $request->name;
                $data->flag = $request->flag;

                $data->save();

                return redirect()->route('countries')->with(BootstrapAlerts::addSuccess('Success! Data has been created'));

            } catch (\Throwable $th) {
                return redirect()->back()->with(BootstrapAlerts::addError('Failed! Data can not be created'));
            }
        }
    }

    public function edit($id)
    {
        $item = Country::find($id);
        return view('countries.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $validator = FacadesValidator::make(
            $request->all(),
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'Name is a required field',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        } else {
            try {
                $data = Country::find($id);

                $data->name = $request->name;
                $data->flag = $request->flag;

                $data->update();

                return redirect()->route('countries')->with(BootstrapAlerts::addSuccess('Success! Data has been updated'));

            } catch (\Throwable $th) {
                return redirect()->back()->with(BootstrapAlerts::addError('Failed! Data can not be updated'));
            }
        }
    }

    public function distroy()
    {
        // 
    }

    public function restore()
    {
        // 
    }

    public function delete($id)
    {
        $item = Country::find($id);
        $item->delete();
        return redirect()->back()->with(BootstrapAlerts::addSuccess('Deleted! Data has been deleted'));
    }

    public function forceDelete()
    {
        // 
    }
}
