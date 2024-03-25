<?php

namespace App\Livewire\Country;

use App\Models\Country;
use Livewire\Attributes\On;
use Livewire\Component;

class CountryRecord extends Component
{
    public $search;
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
        session()->flash('alert-message', ['message' => 'Deleted! Data has been deleted', 'type' => 'success']);
    }

    public function render()
    {
        $this->collection = Country::with('shops', 'cities')
            ->when(strlen($this->search) > 0, function ($query){
                $query->where('name', 'LIKE', "%$this->search%");
            })
            ->get();
        return view('livewire.country.country-record');
    }
}
