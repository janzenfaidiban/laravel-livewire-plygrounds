<?php

namespace App\Livewire\Shop;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;

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

    public $shops = [];

    #[On('action')]
    public function action($type, $data=[]): void
    {
        $this->id = $data['id'] ?? '';
        $this->formType = $type;
        $this->shops = $data;
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
        return view('livewire.shop.index');
    }

}
