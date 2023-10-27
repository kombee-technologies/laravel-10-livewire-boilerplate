<?php

namespace App\Livewire\User;

use App\Livewire\Forms\UserForm;
use App\Models\City;
use App\Models\Country;
use App\Models\Hobby;
use App\Models\State;
use App\Traits\UploadTrait;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Edit extends Component
{

    use WithFileUploads, UploadTrait;

    public $id;

    public UserForm $user;
    public $countries, $states, $cities;


    public function mount($id)
    {
        $this->id = $id;
        $this->user->setPost($id);
        //dd( $this->user);
        $this->countries = Country::all();
    }

    public function updatedUserCountryId($countryId)
    {

        if (!is_null($countryId)) {
            $this->states = State::where('country_id', $countryId)->get();
        }

        // Reset values
        unset($this->cities);

    }

    public function updatedUserStateId($stateId)
    {

        if (!is_null($stateId)) {
            $this->cities = City::where('state_id', $stateId)->get();
        }

    }

    public function save()
    {
        $this->validate();

        $userData = [
            'id' => $this->id,
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
        //$user = Helper::userStore($userData);

        /* Insert or Update multiple hobbies */
        //Helper::hobbiesStore($user, $this->form->hobbies);

        session()->flash('success', __('messages.user.messages.update'));
        return $this->redirect('/users', navigate: true);

    }

    /**
     * @return null
     */
    public function cancel()
    {
        return $this->redirect('/users', navigate: true);
    }

    public function render()
    {
        return view('livewire.user.edit', ['getHobbies' => Hobby::all()]);
    }
}
