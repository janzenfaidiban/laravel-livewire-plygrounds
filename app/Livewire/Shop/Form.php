<?php

namespace App\Livewire\Shop;

use App\Models\Country;
use App\Models\ShopsTags;
use App\Models\Tag;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Shop;
use Illuminate\Support\Str;
use App\Models\City;
use Exception;

class Form extends Component
{
    #[Validate('required', message: 'Please provide a shop title')]
    #[Validate('min:3', message: 'Your shop name is too short.')]
    public string $name = '';

    #[Validate('required', message: 'Please select country')]
    public $country;

    #[Validate('required', message: 'Please select city')]
    public $cityId;

    #[Validate('required', message: 'Please select tag or create new tag')]
    public $tagsAdded=[];

    public string $formType = '';
    public $shops;
    public Collection $tags;
    public Collection $shopTags;

    #[Url(history: true, except: '')]
    public string $id;

    public $countries = [];
    public $cities = [];

    public string $selectedCountry = '';
    public string $selectedCity = '';

    public function mount(): void
    {
        $this->shops = Shop::query()->find( $this->id ?? $this->shops['id'] ?? '');
        $this->name = $this->shops['name'] ?? '';
        $this->cityId = $this->shops['city_id'] ?? '';
        $this->tags = Tag::query()->pluck('name');
        $this->shopTags = Tag::query()->with('shops')
            ->whereHas('shops', function($query){
                $query->where('shop_id', $this->shops['id'] ?? '');
            })
            ->pluck('name');
        $this->tagsAdded = $this->shopTags ?? [];
        $this->countries = Country::query()->get()->map->only('id', 'name');

        if ($this->cityId){
            $city = City::query()->where('id', $this->cityId)->first();
            $this->countryId($city->country->id);
            $this->selectedCountry = $city->country->name;
            $this->selectedCity = $city->name;
        }
    }

    #[On('tagsAdded')]
    public function tagsAdded($data): void
    {
        $this->tagsAdded = $data;
    }

    #[On('countryId')]
    public function countryId($id): void
    {
        $this->country = $id;
        $this->cities = City::query()->where(['country_id' => $id])->get()->map->only('id', 'name');
    }
    #[On('cityId')]
    public function cityId($id): void
    {
        $this->cityId = $id;
    }

    public function save(): void
    {
        $this->validate();
        try {
            DB::beginTransaction();
            $slug = Str::slug($this->name, '-');
            $shop = Shop::query()->create([
                'name' => $this->name,
                'slug' => $slug,
                'city_id' => $this->cityId
            ]);

            $this->saveTags($shop);

            DB::commit();
            $this->dispatch('clear', ['message' => 'Success! Data has been created' , 'type' => 'success']);
        } catch (Exception $e){
            DB::rollBack();
            $this->dispatch('clear', ['message' => $e->getMessage() , 'type' => 'danger']);
        }
    }

    private function saveTags($shop):void
    {
        foreach($this->tagsAdded as $item){
            $tags = Tag::query()->where(['name' => $item])->first();
            if(!$tags){
                $tags = Tag::query()->create([
                    'name' => $item
                ]);
            }
            ShopsTags::query()->updateOrCreate([
                'shop_id' => $shop->id,
                'tag_id' => $tags->id
            ]);
        }
        if($this->formType == 'Edit'){
            $tagIds = Tag::query()->whereNotIn('name', $this->tagsAdded)->pluck('id');
            ShopsTags::query()->where(['shop_id' => $shop->id])->whereIn('tag_id', $tagIds)->delete();
        }
    }

    public function edit(): void
    {
        $shop = Shop::find($this->shops['id']);
        $shop->name = $this->name;
        $shop->city_id = $this->cityId;
        $shop->save();
        $this->saveTags($shop);
        $this->dispatch('clear', ['message' => 'Success! Data has been updated', 'type' => 'success']);
    }

    public function render()
    {
        return view('livewire.shop.form');
    }
}
