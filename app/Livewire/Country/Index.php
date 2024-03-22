<?php

namespace App\Livewire\Country;

use App\Models\Country;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public $isForm = false;
    public $formType = '';
    public $countries = [];

    #[On('action')]
    public function action($value, $type, $data=[]): void
    {
        $this->isForm = $value;
        $this->formType = $type;
        $this->countries = $data;
    }

    #[On('clear')]
    public function clear($message=null): void
    {
        $this->isForm = false;
        if($message) session()->flash('alert-message', $message);
    }

    public function render()
    {
        return view('livewire.country.index');
    }
}
