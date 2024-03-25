<?php

namespace App\Livewire\City;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\City;

class Index extends Component
{

    public $isForm = false;
    public $formType = '';
    public $cities = [];

    #[On('action')]
    public function action($value, $type, $data=[]): void
    {
        $this->isForm = $value;
        $this->formType = $type;
        $this->cities = $data;
    }

    #[On('clear')]
    public function clear($message=null): void
    {
        $this->isForm = false;
        if($message) session()->flash('alert-message', $message);
    }

    public function render()
    {
        return view('livewire.city.index');
    }

}
