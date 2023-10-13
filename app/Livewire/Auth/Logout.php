<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Session;

class Logout extends Component
{

    /**
     * mount
     *
     * @return void
     */
    public function logout(){
        Session::flush();
        Auth::logout();
        return $this->redirect('/login', navigate: true);// redirect to login

    }

    public function render()
    {
        return view('livewire.auth.logout');
    }
}
