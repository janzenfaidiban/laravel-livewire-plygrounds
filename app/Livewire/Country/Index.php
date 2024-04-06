<?php

namespace App\Livewire\Country;

use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class Index extends Component
{
    public $formType = '';

    #[Url]
    public $id = '';

    protected function queryString(): array
    {
        return [
            'formType' => [
                'as' => 'form',
            ]
        ];
    }

    public $country = [];

    #[On('action')]
    public function action($type, $data=[]): void
    {
        $this->formType = $type;
        $this->id = $data['id'] ?? '';
        $this->country = $data;
    }

    #[On('clear')]
    public function clear($message=null): void
    {
        $this->formType = '';
        $this->id = '';
        if($message) session()->flash('alert-message', $message);
    }

    public function render(): View
    {
        return view('livewire.country.index');
    }
}
