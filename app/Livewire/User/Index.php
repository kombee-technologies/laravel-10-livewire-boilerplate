<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;

class Index extends Component
{

    #[On('deleteConfirmed')]
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        //dd($id);
        $this->dispatch('showDeleted', type: 'success', message: __('messages.user.messages.delete'));
    }

    public function render()
    {
        return view('livewire.user.index');
    }
}
