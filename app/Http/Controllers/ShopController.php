<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\ShopsTags;
use Eelcol\LaravelBootstrapAlerts\Facade\BootstrapAlerts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use App\Models\Tag;

class ShopController extends Controller
{
    public $shops;
    public function index(Request $request)
    {
        $collection =  Shop::with('city','tags')
        ->when(strlen($request->s) > 0, function ($query) use ($request){
            $query
                ->where('name', 'LIKE', "%$request->s%")
                ->orWhereHas('city',function($city) use ($request){
                    $city
                    ->where('name', 'LIKE', "%$request->s%")
                    ->orWhereHas('country',function($country) use ($request) {
                        $country->where('name','LIKE',"%$request->s%");
                    });
                });
        })
        ->paginate(5);

        return view('laravel.shop.index', compact('collection','request'));
    }

    public function create()
    {
        $tags = Tag::query()->pluck('name');
        return view('laravel.shop.create',compact('tags'));
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
                $data->city_id = $request->city_id;

                $data->save();

                foreach($request->tags as $item){
                    $tags = Tag::query()->where(['name' => $item])->first();
                    if(!$tags){
                        $tags = Tag::query()->create([
                            'name' => $item
                        ]);
                    }
                    ShopsTags::query()->updateOrCreate([
                        'shop_id' => $data->id,
                        'tag_id' => $tags->id
                    ]);
                }

                return redirect()->route('laravel.shops')->with(BootstrapAlerts::addSuccess('Success! Data has been created'));

            } catch (\Throwable $th) {
                return redirect()->back()->with(BootstrapAlerts::addError('Failed! Data can not be created'));
            }
        }
    }

    public function edit($id)
    {
        $item = Shop::find($id);
        $tags = Tag::query()->pluck('name');
        $shopTags = Tag::query()->with('shops')
        ->whereHas('shops', function($query) use ($id){
            $query->where('shop_id', $id ?? '');
        })
        ->pluck('name');
        return view('laravel.shop.edit', compact('item','tags','shopTags'));
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
                $data->city_id = $request->city_id;
                $data->update();
                foreach($request->tags as $item){
                    $tags = Tag::query()->where(['name' => $item])->first();
                    if(!$tags){
                        $tags = Tag::query()->create([
                            'name' => $item
                        ]);
                    }
                    ShopsTags::query()->updateOrCreate([
                        'shop_id' => $data->id,
                        'tag_id' => $tags->id
                    ]);
                }

                $tagIds = Tag::query()->whereNotIn('name', $request->tags)->pluck('id');
                ShopsTags::query()->where(['shop_id' => $id])->whereIn('tag_id', $tagIds)->delete();

                return redirect()->route('laravel.shops')->with(BootstrapAlerts::addSuccess('Success! Data has been updated'));

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
        $item = Shop::find($id);
        $item->delete();
        return redirect()->back()->with(BootstrapAlerts::addSuccess('Deleted! Data has been deleted'));
    }

     public function forceDelete()
    {
        //
    }
}
