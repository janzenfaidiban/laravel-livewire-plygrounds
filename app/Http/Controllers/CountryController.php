<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Eelcol\LaravelBootstrapAlerts\Facade\BootstrapAlerts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

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
        $validator = FacadesValidator::make(
            $request->all(),
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'This is a required field',
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

                // dd('sucess');

                return redirect()->route('country')->with(BootstrapAlerts::addSuccess('Success! Data has been created'));

            } catch (\Throwable $th) {
                return redirect()->back()->with(BootstrapAlerts::addError('Failed! Data can not be created'));
            }
        }
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
        $data = Country::find($id);
        $data->delete();
        return redirect()->back()->with(BootstrapAlerts::addError('Deleted! Data has been deleted'));
    }
}
