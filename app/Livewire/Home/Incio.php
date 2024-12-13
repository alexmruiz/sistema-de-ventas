<?php

namespace App\Livewire\Home;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Inicio text')]
class Incio extends Component
{
    public function render()
    {
        return view('livewire.home.incio', [
            'title' => 'Inicio text', 
        ]);
    }
}