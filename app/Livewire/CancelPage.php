<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
#[Title("Cancel Order | Shope Ease")]

class CancelPage extends Component
{
    public function render()
    {
        return view('livewire.cancel-page');
    }
}
