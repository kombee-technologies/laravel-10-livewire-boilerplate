<?php
namespace App\Traits;

use App\Models\User;

trait UserTrait {

    /**
     * @param $userData
     * @return mixed
     */
    public function userStore($userData)
    {

        $userData['user_type'] = config('constants.user.user_type_enum.1'); // User type id author or sub admin
        $userData['status'] = config('constants.user.status_enum.1');
        $userData = User::create($userData);// Insert Data into the users table

       /* if(isset($userData['id']) && $userData['id'] !=''){
            $userData = User::where('id',$userData['id'])->update($userData);
        } else {
            $userData = User::create($userData);
        }*/

        return $userData;

       }
}
