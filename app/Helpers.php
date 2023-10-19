<?php

namespace App\Helpers;
use App\Models\User;

class Helper {

   public static function generateOTP(){
       return app()->environment('production') ? rand(100000, 999999) : '123456';
   }

   public static function userStore($userData){

    $userData['user_type'] = config('constants.user.user_type_enum.1'); // User type id author or sub admin
    $userData['status'] = config('constants.user.status_enum.1');
    $userData = User::create($userData);

    return $userData;

   }
}
