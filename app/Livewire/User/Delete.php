<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;


class Delete extends Component
{

    public $id;

    #[On('delete-confirmation')]
    public function deleteConfirmation($id)
    {
        $this->id = $id;
        $this->dispatch('showDeleteConfirmation');
    }

    #[On('delete-confirmed')]
    public function destroy(){
        if($this->id){
            User::where('id', $this->id)->delete();
            $this->dispatch( __('messages.refreshTable'));
            $this->dispatch('alert', type: 'success', message: __('messages.user.messages.delete'));
        } else {
            $this->dispatch('alert', type: 'error', message: __('messages.user.errors.not_found'));
        }

    }

    public function render()
    {
        return view('livewire.user.delete');
    }
}
