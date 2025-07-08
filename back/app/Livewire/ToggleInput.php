<?php

namespace App\Livewire;

use Livewire\Component;

class ToggleInput extends Component
{
    public bool $checked = false;
    
    public string $disabled = '';

    public function processMark()
    {
        if ($this->checked) {
            $this->disabled = 'disabled';
        }
    }

    public function render()
    {
        return view('livewire.toggle-input');
    }
}
