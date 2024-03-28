<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Eelcol\LaravelBootstrapAlerts\Facade\BootstrapAlerts;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use App\Models\Tag;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $collection =  Tag::with(relations:'shops')->when(strlen($request->s) > 0, function ($query) use ($request){
            $query->where('name', 'LIKE', "%$request->s%");
        })
        ->get();
        return view('tag.index', compact('collection','request'));
    }

    public function create()
    {
        return view('tag.create');
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
                $data = new tag();

                $data->name = $request->name;
                $data->slug = Str::slug($request->name);
                $data->save();

                return redirect()->route('tags')->with(BootstrapAlerts::addSuccess('Success! Data has been created'));

            } catch (\Throwable $th) {
                return redirect()->back()->with(BootstrapAlerts::addError('Failed! Data can not be created'));
            }
        }
    }

    public function edit($id)
    {
        $item = tag::find($id);
        return view('tag.edit', compact('item'));
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
                $data = tag::find($id);

                $data->name = $request->name;

                $data->update();

                return redirect()->route('tags')->with(BootstrapAlerts::addSuccess('Success! Data has been updated'));

            } catch (\Throwable $th) {
                return redirect()->back()->with(BootstrapAlerts::addError('Failed! Data can not be updated'));
            }
        }
    }
    public function restore()
    {
        //
    }

    public function distroy()
    {
        //
    }

    public function delete($id)
    {
        $item = tag::find($id);
        $item->delete();
        return redirect()->back()->with(BootstrapAlerts::addSuccess('Deleted! Data has been deleted'));
    }

     public function forceDelete()
    {
        //
    }
}
