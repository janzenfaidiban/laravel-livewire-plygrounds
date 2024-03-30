<?php

namespace App\Livewire\City;

use Livewire\Component;
use App\Models\City;
use Livewire\Attributes\On;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class CityRecord extends Component
{
    use WithPagination;

    public $search;
    // public $collection = [];
    public $city;

    #[Url]
    public $page;
    protected function queryString(): array
    {
        return [
            'search' => [
                'as' => 'q',
            ]
        ];
    }

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

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function resetPage(): void
    {
        $this->paginators['page'] = 1;
        $this->page = 1;
    }

    public function render(): View
    {
        $collection = City::with(relations:'shops')
            ->when(strlen($this->search) > 0, function ($query){
                $query
                    ->where('name', 'LIKE', "%$this->search%")
                    ->orWhereHas('country',function($country){
                        $country->where('name','LIKE',"%$this->search%");
                    })
                    ;
            })
            ->paginate(5)->withQueryString();
        return view('livewire.city.city-record', ['collection' => $collection]);
    }
}
