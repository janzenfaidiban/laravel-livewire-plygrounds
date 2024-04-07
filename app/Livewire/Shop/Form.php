<?php

namespace App\Livewire\Shop;

use App\Models\ShopsTags;
use App\Models\Tag;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Shop;
use Illuminate\Support\Str;
use App\Models\City;
use Exception;

class Form extends Component
{
    public string $name = '';
    public string $city_id = '';
    public string $formType = '';
    public $shops;
    public Collection $tags;
    public Collection $shopTags;
    public $tagsAdded=[];

    #[Url(history: true, except: '')]
    public string $id;

    public function mount(): void
    {
        $this->shops = Shop::query()->find( $this->id ?? $this->shops['id'] ?? '');
        $this->name = $this->shops['name'] ?? '';
        $this->city_id = $this->shops['city_id'] ?? '';
        $this->tags = Tag::query()->pluck('name');
        $this->shopTags = Tag::query()->with('shops')
            ->whereHas('shops', function($query){
                $query->where('shop_id', $this->shops['id'] ?? '');
            })
            ->pluck('name');
        $this->tagsAdded = $this->shopTags ?? [];
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
        $shop->city_id = $this->city_id;
        $shop->save();
        $this->saveTags($shop);
        $this->dispatch('clear', ['message' => 'Success! Data has been updated', 'type' => 'success']);
    }

    public function render()
    {
        return view('livewire.shop.form');
    }
}
