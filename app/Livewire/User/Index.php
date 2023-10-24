<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\Attributes\On;

class Index extends Component
{

    #[On('deleteConfirmation')]
     public function updateDeleteConfirmation($id)
    {
        //dd($id);
        //$this->dispatch('show-delete-confirmation', type: 'success', message: __('messages.login.otp_successfully'));
    }

    public function render()
    {
        return view('livewire.user.index');
    }

}
