<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdProduct extends Component
{
    public function render()
    {
        return view('livewire.ad-product')->ad("admin.index");
    }
}
