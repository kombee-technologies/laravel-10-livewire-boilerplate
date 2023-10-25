<?php

namespace App\Livewire\User;

use App\Helpers\Helper;
use App\Livewire\Forms\UserForm;
use App\Models\City;
use App\Models\Country;
use App\Models\Hobby;
use App\Models\State;
use App\Models\User;
use App\Traits\UploadTrait;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Edit extends Component
{

    use WithFileUploads, UploadTrait;

    public $id;

    public UserForm $form;
    public $countries, $states, $cities, $comment;
    //public $hobbies = [], $galleries = [], $tags = [], $multiple_options;

    public function mount($id)
    {
        $this->id = $id;
        $this->form->setPost($id);
        $this->countries = Country::all();
    }

    public function updatedFormCountryId($countryId)
    {

        if (!is_null($countryId)) {
            $this->states = State::where('country_id', $countryId)->get();
        }

        // Reset values
        unset($this->cities);

    }

    public function updatedFormStateId($stateId)
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
            'first_name' => $this->form->first_name,
            'last_name' => $this->form->last_name,
            'email' => $this->form->email,
            'mobile_no' => $this->form->mobile_no,
            'gender' => $this->form->gender,
            'dob' => $this->form->dob,
            'country_id' => $this->form->country_id,
            'state_id' => $this->form->state_id,
            'city_id' => $this->form->city_id,
            'address' => $this->form->address,
        ];

        /* common code for user data insert into database */
        $user = Helper::userStore($userData);

        /* Insert or Update multiple hobbies */
        Helper::hobbiesStore($user, $this->form->hobbies);

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
