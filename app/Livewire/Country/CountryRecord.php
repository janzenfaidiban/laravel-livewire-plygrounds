<?php

namespace App\Livewire\Country;

use App\Models\Country;
use Livewire\Attributes\On;
use Livewire\Component;

class CountryRecord extends Component
{
    public $collection = [];
    public $country;
    #[On('modal')]
    public function handleEvent($data): void
    {
        $this->country = $data;
    }

    public function delete($id): void
    {
        $country = Country::query()->find($id);
        $country->delete();
        session()->flash('alert-message', ['message' => 'Deleted! Data has been deleted', 'type' => 'danger']);
    }

    public function render()
    {
        $this->collection = Country::with('shops', 'cities')->get();
        return view('livewire.country.country-record');
    }
}
