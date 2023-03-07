<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id' => (string)$this->id,
            'first_name' => (string)$this->first_name,
            'last_name' => (string)$this->last_name,
            'email' => (string)$this->email,
            'mobile_no' => (string)$this->mobile_no,
            'user_type' => (string)$this->user_type,
            'user_type_text' =>  config('constants.user.user_type.' . $this->user_type),
            'gender' => (string)$this->gender,
            'gender_text' =>  config('constants.user.gender.' . $this->gender),
            'dob' => (string)$this->dob,
            'country_id' => (string)$this->country_id,
            'country' => $this->country,
            'state_id' => (string)$this->state_id,
            'state' => $this->state,
            'city_id' => (string)$this->city_id,
            'city' => $this->city,
            'address' => (string)$this->address,
            'status' => (string)$this->status,
            'status_text' => config('constants.user.status.' . $this->status),
            'gallery' => $this->user_galleries,
            'hobby' => $this->hobbies,
            'authorization' => $this->authorization,
            'email_verified_at' => $this->email_verified_at,
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at
        ];
    }
}
