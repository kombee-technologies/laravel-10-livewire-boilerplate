<?php

namespace App\Helpers;

use App\Models\Hobby_user;
use App\Models\User;
use App\Models\UserGallery;

class Helper {

    /**
     * @return int|string
     */
   public static function generateOTP(){
       return app()->environment('production') ? rand(100000, 999999) : '123456';
   }

    /**
     * @param $userData
     * @return mixed
     */
   public static function userStore($userData){

    $userData['user_type'] = config('constants.user.user_type_enum.1'); // User type id author or sub admin
    $userData['status'] = config('constants.user.status_enum.1');
    if(isset($userData['id']) && $userData['id'] !=''){
        $userData = User::where('id',$userData['id'])->update($userData);
    } else {
        $userData = User::create($userData);
    }
    return $userData;

   }

    /**
     * @param $user
     * @param $galleries
     * @return void
     */
    public static function galleriesStore($user, $galleries){
        /* Insert multiple user galleries */
        if (!empty($galleries)) {
            $userId = $user->id;
            $realPath = 'user/' . $userId . '/';
            foreach ($galleries as $image) {
                $path = $user->uploadOne($image, '/public/' . $realPath);
                UserGallery::create(['user_id' => $userId, 'filename' => $realPath . pathinfo($path, PATHINFO_BASENAME)]);
            }
        }
    }

    /**
     * @param $user
     * @param $hobbies
     * @return void
     */
    public static function hobbiesStore($user, $hobbies)
    {
        //Hobby_user::where('user_id', $user->id)->delete();
        /* Insert multiple hobbies */
        if (!empty($hobbies)) {
            $user->hobbies()->attach($hobbies); //this executes the insert-query
        }
    }
}
