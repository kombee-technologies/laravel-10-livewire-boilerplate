<?php

namespace App\Livewire\Forms;

use App\Models\City;
use App\Models\State;
use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Form;

class UserForm extends Form
{
    public ?User $user;

    //#[Rule('required|string|max:255')]
    public $first_name;

    //#[Rule('required|string|max:255')]
    public $last_name;

    //#[Rule('required|email|unique:users,email|max:255')]
    public $email;

    //#[Rule('required|regex:/^[6-9]\d{9}$/|digits:10')]
    public $mobile_no;

    //#[Rule('required|string|max:500')]
    public $address;

    //#[Rule('required|in:0,1')]
    public $gender;

    //#[Rule('required|date|date_format:Y-m-d')]
    public $dob;

    //#[Rule('required|integer|exists:countries,id,deleted_at,NULL')]
    public $country_id;

    //#[Rule('required|integer|exists:states,id,deleted_at,NULL')]
    public $state_id;

    //#[Rule('required|integer|exists:cities,id,deleted_at,NULL')]
    public $city_id;

    public $hobbies = [], $galleries = [], $tags = [], $multiple_options;

    public $countries, $states, $cities, $comment;


    protected function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            //'email' => ['required', 'email', 'unique:users,email'],
            'mobile_no' => 'required | regex:/^[6-9]\d{9}$/ | digits:10',
            'address' => ['required', 'string', 'max:500'],
            'gender' =>  'required|in:0,1',
            'dob' => 'required|date|date_format:Y-m-d',
            'country_id' => 'required|integer|exists:countries,id,deleted_at,NULL',
            'state_id' => 'required|integer|exists:states,id,deleted_at,NULL',
            'city_id' => 'required|integer|exists:cities,id,deleted_at,NULL',
            //'hobbies' => 'required|exists:hobbies,id,deleted_at,NULL|array',
            //'hobbies.*' => 'required|integer',
            'galleries' => 'required|array|max:5',
            'galleries.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            //'comment.0' => 'required',
            //'comment.*' => 'required',
            //'multiple_options' => 'required',
            //'tags' => 'required',

        ];
    }

    public function setPost($id)
    {
        $this->user = User::findOrFail($id);

        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
        $this->email = $this->user->email;
        $this->mobile_no = $this->user->mobile_no;
        $this->address = $this->user->address;
        $this->gender = $this->user->gender;
        $this->dob = $this->user->dob;
        $this->country_id = $this->user->country_id;
        $this->state_id = $this->user->state_id;
        $this->city_id = $this->user->city_id;

        $this->hobbies = $this->user->hobbies_id;

        $this->states = State::orderby('name', 'asc')
            ->select('*')
            ->where('country_id', $this->user->country_id)
            ->get();

        $this->cities = City::orderby('name', 'asc')
            ->select('*')
            ->where('state_id', $this->user->state_id)
            ->get();
    }

}
