<?php

namespace App\Livewire\City;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;

class Index extends Component
{

    // public $isForm = false;
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

    public $cities = [];

    #[On('action')]
    public function action($type, $data=[]): void
    {
        $this->formType = $type;
        $this->formType = $type;
        $this->cities = $data;
    }

    #[On('clear')]
    public function clear($message=null): void
    {
        $this->formType = '';
        $this->id = '';
        if($message) session()->flash('alert-message', $message);
    }

    public function render()
    {
        return view('livewire.city.index');
    }

}
