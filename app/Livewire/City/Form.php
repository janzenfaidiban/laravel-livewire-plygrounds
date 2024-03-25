<?php

namespace App\Livewire\City;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\City;
use App\Models\Country;
use Eelcol\LaravelBootstrapAlerts\Facade\BootstrapAlerts;
use Illuminate\Support\Str;

class Form extends Component
{
    public $name = '';
    public $country_id = '';
    public $formType = '';
    public $cities = [];

    public function mount(): void
    {
        $this->name = $this->cities['name'] ?? '';
        $this->country_id = $this->cities['country_id'] ?? '';
    }

    public function save(): void
    {
        $slug = Str::slug($this->name, '-');
        City::query()->create([
            'name' => $this->name,
            'slug' => $slug,
            'country_id' => $this->country_id
        ]);
        $this->dispatch('clear', ['message' => 'Success! Data has been created' , 'type' => 'success']);
    }

    public function edit(): void
    {
        $city = City::find($this->cities['id']);
        $city->name = $this->name;
        $city->country_id = $this->country_id;
        $city->save();
        $this->dispatch('clear', ['message' => 'Success! Data has been updated', 'type' => 'success']);
    }

    public function render()
    {
        return view('livewire.city.form');
    }
}
