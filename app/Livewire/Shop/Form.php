<?php

namespace App\Livewire\Shop;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Shop;
use Illuminate\Support\Str;
use App\Models\City;

class Form extends Component
{
    public $name = '';
    public $city_id = '';
    public $formType = '';
    public $shops = [];

    public function mount(): void
    {
        $this->name = $this->shops['name'] ?? '';
        $this->city_id = $this->shops['city_id'] ?? '';
    }

    public function save(): void
    {
        $slug = Str::slug($this->name, '-');
        Shop::query()->create([
            'name' => $this->name,
            'slug' => $slug,
            'city_id' => $this->city_id
        ]);
        $this->dispatch('clear', ['message' => 'Success! Data has been created' , 'type' => 'success']);
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
