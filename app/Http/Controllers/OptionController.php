<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserOption;
use App\Models\User;

class OptionController extends Controller
{
    //

    public static function store($user, $options)
    {

        /* Insert multiple user comments */
        if (!empty($options)) {
            $userId = $user->id;
            foreach ($options as $key => $value) {
                UserOption::create(['user_id' => $userId, 'options' => $options[$key]]);
            }
        }
    }


    public static function update($userId, $options)
    {
        $user = User::find($userId);
        /* Insert multiple user comments */
        if (!empty($options)) {
            // $userId = $user->id;
            UserOption::where('user_id', $userId)->delete();
            foreach ($options as $key => $value) {
                UserOption::create(['user_id' => $userId, 'options' => $options[$key]]);
            }
        }
    }
}
