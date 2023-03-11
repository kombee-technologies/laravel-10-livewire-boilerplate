<?php

namespace App\Http\Controllers;

use App\Models\UserGallery;

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
}
