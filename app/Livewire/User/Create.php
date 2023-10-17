<?php

namespace App\Livewire\User;

use App\Models\City;
use App\Models\Country;
use App\Models\Hobby;
use App\Models\State;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Traits\UploadTrait;
use Illuminate\Validation\Rule;

class Create extends Component
{
    use WithFileUploads, UploadTrait;

    public User $user;
    public $countries, $states, $cities, $comment, $upid, $previousRoute;
    public $hobbies = [], $galleries = [], $tags = [], $multiple_options;


    public function mount()
    {
        $this->user = new User;
        $this->countries = Country::all();
    }

    public function hydrate()
    {
        $this->dispatch('render-select2');
    }

    protected function rules()
    {
        return [
            'user.first_name' => ['required', 'string', 'max:255'],
            'user.last_name' => ['required', 'string', 'max:255'],
            'user.email' => ['required', 'email', 'unique:users,email'],
            'user.mobile_no' => 'required | regex:/^[6-9]\d{9}$/ | digits:10',
            'user.address' => ['required', 'string', 'max:500'],
            'user.gender' =>  ['required', Rule::in([0, 1])],
            'user.dob' => 'required|date|date_format:Y-m-d',
            'user.country_id' => 'required|integer|exists:countries,id,deleted_at,NULL',
            'user.state_id' => 'required|integer|exists:states,id,deleted_at,NULL',
            'user.city_id' => 'required|integer|exists:cities,id,deleted_at,NULL',
            'hobbies' => 'required|exists:hobbies,id,deleted_at,NULL|array',
            'hobbies.*' => 'required|integer',
            'galleries' => 'required|array|max:5',
            'galleries.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            //'comment.0' => 'required',
            //'comment.*' => 'required',
            //'multiple_options' => 'required',
            //'tags' => 'required',

        ];
    }

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

        /* if ($this->role_id == config('constants.users_roles_ids.client')) {
            Mail::to($this->user->email)->queue(new WelcomeUser($this->user));
        } */
    }

    public function render()
    {
        return view('livewire.user.create', ['getHobbies' =>  Hobby::all()]);
    }
}
