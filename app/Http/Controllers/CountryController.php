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
                'golongandarah' => 'required',
            ],
            [
                'golongandarah.required' => 'Data ini wajib dilengkapi',
            ]
        );


        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        } else {
            try {
                $data = new Country();
                $data->golongandarah = $request->golongandarah;
                $data->keterangan = $request->keterangan;
                $data->save();

                return redirect()->route('beranda.masterdata.golongandarah')->with(BootstrapAlerts::addSuccess('Berhasil! Data telah ditambahkan ke database'));
            } catch (\Throwable $th) {
                return redirect()->route('beranda.masterdata.golongandarah')->with(BootstrapAlerts::addError('Gagal! Data gagal ditambahkan ke database'));
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
        //
    }
}
