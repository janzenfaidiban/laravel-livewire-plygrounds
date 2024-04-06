<?php

namespace App\Livewire\Country;

use App\Models\Country;
use Illuminate\Support\Str;
use Livewire\Attributes\Url;
use Livewire\Component;

class Form extends Component
{
    public $name = '';
    public $flag = '';
    public $formType = '';
    public $country = [];

    #[Url(history: true, except: '')]
    public $id;

    public function mount(): void
    {
        $this->country = Country::query()->find($this->id ?? $this->country['id'] ?? '');
        if($this->formType == 'Create') $this->country = [];
        $this->name = $this->country['name'] ?? '';
        $this->flag = $this->country['flag'] ?? '';
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
        $country = $this->country;
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
