<?php

namespace App\Livewire;

use Livewire\Component;

class RealtimeInput extends Component
{
    public string $title;

    public function render()
    {
        return view('livewire.realtime-input');
    }
}
