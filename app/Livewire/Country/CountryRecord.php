<?php

namespace App\Livewire\Country;

use Livewire\Component;
use App\Models\Country;
use Livewire\Attributes\On;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class CountryRecord extends Component
{
    use WithPagination;

    public $search;
    public $country;

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
        $this->country = $data;
    }

    public function delete($id): void
    {
        $country = Country::query()->find($id);
        $country->delete();
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
        $countries = Country::with('shops', 'cities')
            ->when(strlen($this->search) > 0, function ($query){
                $query->where('name', 'LIKE', "%$this->search%");
            })
            ->paginate(5)->withQueryString();
        return view('livewire.country.country-record', ['countries' => $countries]);
    }
}
