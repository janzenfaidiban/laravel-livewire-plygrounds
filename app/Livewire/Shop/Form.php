<?php

namespace App\Livewire\Shop;

use App\Models\ShopsTags;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Shop;
use Illuminate\Support\Str;
use App\Models\City;
use Exception;

class Form extends Component
{
    public $name = '';
    public $city_id = '';
    public $formType = '';
    public $shops = [];
    public $tags = [];
    public $tagsAdded=[];

    public function mount(): void
    {
        $this->name = $this->shops['name'] ?? '';
        $this->city_id = $this->shops['city_id'] ?? '';
        $this->tags = Tag::query()->pluck('name');
    }

    #[On('tagsAdded')]
    public function tagsAdded($data): void
    {
        $this->tagsAdded = $data;
    }

    public function save(): void
    {
        try {
            DB::beginTransaction();
            $slug = Str::slug($this->name, '-');
            $shop = Shop::query()->create([
                'name' => $this->name,
                'slug' => $slug,
                'city_id' => $this->city_id
            ]);

            foreach($this->tagsAdded as $item){
                $tags = Tag::query()->where(['name' => $item])->first();
                if(!$tags){
                    $tags = Tag::query()->create([
                        'name' => $item
                    ]);
                }
                ShopsTags::query()->create([
                    'shop_id' => $shop->id,
                    'tag_id' => $tags->id
                ]);
            }
            DB::commit();
            $this->dispatch('clear', ['message' => 'Success! Data has been created' , 'type' => 'success']);
        } catch (Exception $e){
            DB::rollBack();
            $this->dispatch('clear', ['message' => $e->getMessage() , 'type' => 'danger']);
        }
    }

    public function edit(): void
    {
        $country = Shop::find($this->shops['id']);
        $country->name = $this->name;
        $country->city_id = $this->city_id;
        $country->save();
        $this->dispatch('clear', ['message' => 'Success! Data has been updated', 'type' => 'success']);
    }

    public function render()
    {
        return view('livewire.shop.form');
    }
}
