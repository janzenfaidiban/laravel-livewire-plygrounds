<?php

namespace App\Livewire\Country;

use App\Models\Country;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public $collection = [];
    public $id, $name, $flag;

    #[On('edit-country')]
    public function handleDisplayEditCountry($data): void
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->flag = $data['flag'];
    }

    public function edit(): void
    {
        $country = Country::find($this->id);
        $country->name = $this->name;
        $country->flag = $this->flag;
        $country->save();
    }

    public function render()
    {
        $this->collection = Country::with('shops', 'cities')->get();
        return view('livewire.country.index');
    }
}
