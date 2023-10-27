<?php

namespace App\Livewire\User;

use Livewire\Attributes\On;
use Livewire\Component;


class Delete extends Component
{

    public $id;

    #[On('delete-confirmation')]
    public function deleteConfirmation($id)
    {
        $this->id = $id;
        //User::where('id', $id)->delete();
        $this->dispatch('showDeleteConfirmation');
    }

    #[On('delete-confirmed')]
    public function destroy(){
        $this->dispatch('alert', type: 'success', message: __('messages.user.messages.delete'));
    }

    public function render()
    {
        return view('livewire.user.delete');
    }
}
