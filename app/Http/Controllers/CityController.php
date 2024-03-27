<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\City;
use App\Models\Shop;
use Eelcol\LaravelBootstrapAlerts\Facade\BootstrapAlerts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $collection = City::with('country', 'shops') ->when(strlen($request->s) > 0, function ($query) use ($request){
            $query->where('name', 'LIKE', "%$request->s%")
            ->where('name', 'LIKE', "%$request->s%")
            ->orWhereHas('country',function($country) use ($request) {
                $country->where('name','LIKE',"%$request->s%");
            });
        })->get();
        return view('city.index', compact('collection','request'));
    }

    public function shops()
    {
        return $this->has(Shop::class);
    }

    public function create()
    {
        $countries = Country::all();
        return view('city.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $validator = FacadesValidator::make(
            $request->all(),
            [
                'name' => 'required',
                'country_id' => 'required',
            ],
            [
                'name.required' => 'Name is a required field',
                'country_id.required' => 'Country is a required field',
            ]
        );


        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        } else {
            try {
                $data = new City();

                $data->name = $request->name;
                $data->country_id = $request->country_id;
                $data->coordinates = $request->coordinates;
                $data->coordinatesUrl = $request->coordinatesUrl;

                $data->save();

                return redirect()->route('city')->with(BootstrapAlerts::addSuccess('Success! Data has been created'));

            } catch (\Throwable $th) {
                return redirect()->back()->with(BootstrapAlerts::addError('Failed! Data can not be created'));
            }
        }
    }

    public function edit($id)
    {
        $item = City::find($id);
        return view('city.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $validator = FacadesValidator::make(
            $request->all(),
            [
                'name' => 'required',
                'country_id' => 'required',
            ],
            [
                'name.required' => 'Name is a required field',
                'country_id.required' => 'Country is a required field',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        } else {
            try {
                $data = City::find($id);

                $data->name = $request->name;
                $data->country_id = $request->country_id;
                $data->coordinates = $request->coordinates;
                $data->coordinatesUrl = $request->coordinatesUrl;

                $data->update();

                return redirect()->route('city')->with(BootstrapAlerts::addSuccess('Success! Data has been updated'));

            } catch (\Throwable $th) {
                return redirect()->back()->with(BootstrapAlerts::addError('Failed! Data can not be updated'));
            }
        }
    }

    public function delete($id)
    {
        $item = City::find($id);
        $item->delete();
        return redirect()->back()->with(BootstrapAlerts::addSuccess('Deleted! Data has been deleted'));
    }
}
