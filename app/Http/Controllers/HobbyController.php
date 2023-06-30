<?php

namespace App\Http\Controllers;

use App\Models\UserGallery;
use App\Models\Hobby_user;
use App\Models\User;

class HobbyController extends Controller
{


    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public static function store($user, $hobbies)
    {
        /* Insert multiple hobbies */
        if (!empty($hobbies)) {
            $user->hobbies()->attach($hobbies); //this executes the insert-query
        }
    }


    public static function update($userId, $hobbies)
    {
        $user = User::find($userId);
        Hobby_user::where('user_id', $userId)->delete();
        /* Insert multiple hobbies */
        if (!empty($hobbies)) {
            $user->hobbies()->attach($hobbies); //this executes the insert-query
        }
    }
}
