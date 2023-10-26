<?php

namespace App\Livewire\User;

use App\Livewire\Forms\UserForm;
use App\Models\City;
use App\Models\Country;
use App\Models\Hobby;
use App\Models\State;
use App\Traits\GalleryTrait;
use App\Traits\HobbyTrait;
use App\Traits\UserTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads, UserTrait, GalleryTrait, HobbyTrait;

    public UserForm $user;

    public $states, $cities;


    public function updatedUserCountryId($countryId)
    {

        if (!is_null($countryId)) {
            $this->states = State::where('country_id', $countryId)->get();
        }

        // Reset values
        unset($this->cities);
        $this->user->state_id = "";
        $this->user->city_id = "";

    }

    public function updatedUserStateId($stateId)
    {

        if (!is_null($stateId)) {
            $this->cities = City::where('state_id', $stateId)->get();
        }
        // Reset value
        $this->user->city_id = "";
    }

    /**
     * @return null
     */
    public function store()
    {
        $this->validate();

        $userData = [
            'first_name' => $this->user->first_name,
            'last_name' => $this->user->last_name,
            'email' => $this->user->email,
            'mobile_no' => $this->user->mobile_no,
            'gender' => $this->user->gender,
            'dob' => $this->user->dob,
            'country_id' => $this->user->country_id,
            'state_id' => $this->user->state_id,
            'city_id' => $this->user->city_id,
            'address' => $this->user->address,
        ];

        /* common code for user data insert into database */
        $user = $this->userStore($userData);

        /* Insert multiple user galleries */
        $this->galleriesStore($user, $this->user->galleries);

        /* Insert multiple hobbies */
        $this->hobbiesStore($user, $this->user->hobbies);

        //$this->dispatch('alert', type: 'success', message: __('messages.user.messages.store'));
        session()->flash('success', __('messages.user.messages.store'));
        return $this->redirect('/users', navigate: true);

    }

    /**
     * @return null
     */
    public function cancel()
    {
        return $this->redirect('/users', navigate: true);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function render()
    {
        return view('livewire.user.create', ['getHobbies' =>  Hobby::all(), 'countries' => Country::all()]);
    }
}
