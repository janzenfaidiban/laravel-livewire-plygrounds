<?php

namespace App\Livewire\Shop;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Shop;

class Index extends Component
{

    public $isForm = false;
    public $formType = '';
    public $shops = [];

    #[On('action')]
    public function action($value, $type, $data=[]): void
    {
        $this->isForm = $value;
        $this->formType = $type;
        $this->shops = $data;
    }

    #[On('clear')]
    public function clear($message=null): void
    {
        $this->isForm = false;
        if($message) session()->flash('alert-message', $message);
    }

    public function render()
    {
        return view('livewire.shop.index');
    }

}
