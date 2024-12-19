<?php

namespace App\Livewire\Register;

use Livewire\Component;

class RegisterTermsModal extends Component
{
    public $show = FALSE;

    public function toggleModal(){
        return $this->show = !$this->show; 
    }

    public function render()
    {
        return view('livewire.register.register-terms-modal');
    }
}
