<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdCustomer extends Component
{
    public function render()
    {
        return view('livewire.ad-customer')->ad("admin.index");
    }
}
