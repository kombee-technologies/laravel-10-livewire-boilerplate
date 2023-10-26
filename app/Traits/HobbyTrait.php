<?php
namespace App\Traits;

trait HobbyTrait {

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
