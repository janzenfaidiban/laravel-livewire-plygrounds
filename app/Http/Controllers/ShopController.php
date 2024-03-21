<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Eelcol\LaravelBootstrapAlerts\Facade\BootstrapAlerts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

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
                $data = new Shop();

                $data->name = $request->name;
                $data->flag = $request->flag;

                $data->save();

                return redirect()->route('shop')->with(BootstrapAlerts::addSuccess('Success! Data has been created'));

            } catch (\Throwable $th) {
                return redirect()->back()->with(BootstrapAlerts::addError('Failed! Data can not be created'));
            }
        }
    }

    public function edit($id)
    {
        $item = Shop::find($id);
        return view('shop.edit', compact('item'));
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
                $data = Shop::find($id);

                $data->name = $request->name;

                $data->update();

                return redirect()->route('shop')->with(BootstrapAlerts::addSuccess('Success! Data has been updated'));

            } catch (\Throwable $th) {
                return redirect()->back()->with(BootstrapAlerts::addError('Failed! Data can not be updated'));
            }
        }
    }

    public function delete($id)
    {
        $item = Shop::find($id);
        $item->delete();
        return redirect()->back()->with(BootstrapAlerts::addError('Deleted! Data has been deleted'));
    }
}
