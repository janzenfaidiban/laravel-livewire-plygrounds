<?php

namespace App\Livewire\Country;

use App\Models\Country;
use Eelcol\LaravelBootstrapAlerts\Facade\BootstrapAlerts;
use Illuminate\Support\Str;
use Livewire\Component;

class Form extends Component
{
    public $name = '';
    public $flag = '';
    public $formType = '';
    public $countries = [];

    public function mount(): void
    {
        $this->name = $this->countries['name'] ?? '';
        $this->flag = $this->countries['flag'] ?? '';
    }

    public function save(): void
    {
        $slug = Str::slug($this->name, '-');
        Country::query()->create([
            'name' => $this->name,
            'slug' => $slug,
            'flag' => $this->flag
        ]);
        $this->dispatch('clear', ['message' => 'Success! Data has been created' , 'type' => 'success']);
    }

    public function edit(): void
    {
        $country = Country::find($this->countries['id']);
        $country->name = $this->name;
        $country->flag = $this->flag;
        $country->save();
        $this->dispatch('clear', ['message' => 'Success! Data has been updated', 'type' => 'success']);
    }

    public function render()
    {
        return view('livewire.country.form');
    }
}
