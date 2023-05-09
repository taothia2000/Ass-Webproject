<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdOrder extends Component
{
    public function render()
    {
        return view('livewire.ad-order')->ad("admin.index");
    }
}
