<?php

namespace App\Livewire\City;

use Livewire\Component;
use App\Models\City;
use Livewire\Attributes\On;

class CityRecord extends Component
{
    public $search;
    public $collection = [];
    public $city;

    #[On('modal')]
    public function handleEvent($data): void
    {
        $this->city = $data;
    }

    public function delete($id): void
    {
        $city = City::query()->find($id);
        $city->delete();
        session()->flash('alert-message', ['message' => 'Deleted! Data has been deleted', 'type' => 'success']);
    }

    public function render()
    {
        $this->collection = City::with(relations:'shops')
            ->when(strlen($this->search) > 0, function ($query){
                $query
                    ->where('name', 'LIKE', "%$this->search%")
                    ->orWhereHas('country',function($country){
                        $country->where('name','LIKE',"%$this->search%");
                    });
            })
            ->get();
        return view('livewire.city.city-record');
    }
}
