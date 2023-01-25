<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Wizard extends Component
{
    public $currentStep = 1;
    public $name, $amount, $description, $status = 1, $stock;
    public $successMessage = '';
    
    public function render()
    {
        return view('livewire.wizard');
    }
}
