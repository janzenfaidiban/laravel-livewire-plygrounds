<?php

namespace App\Livewire\City;

use App\Models\City;
use Eelcol\LaravelBootstrapAlerts\Facade\BootstrapAlerts;
use Illuminate\Support\Str;
use Livewire\Component;

class Form extends Component
{
    public $name = '';
    public $formType = '';
    public $cities = [];

    public function mount(): void
    {
        $this->name = $this->cities['name'] ?? '';
    }

    public function save(): void
    {
        $slug = Str::slug($this->name, '-');
        City::query()->create([
            'name' => $this->name,
            'slug' => $slug,
        ]);
        $this->dispatch('clear', ['message' => 'Success! Data has been created' , 'type' => 'success']);
    }

    public function edit(): void
    {
        $city = City::find($this->cities['id']);
        $city->name = $this->name;
        $city->save();
        $this->dispatch('clear', ['message' => 'Success! Data has been updated', 'type' => 'success']);
    }

    public function render()
    {
        return view('livewire.city.form');
    }
}
