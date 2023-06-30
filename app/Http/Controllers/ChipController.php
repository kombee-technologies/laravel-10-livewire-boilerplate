<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserChip;
use App\Models\User;

class ChipController extends Controller
{
    //

    public static function store($user, $chips)
    {

        /* Insert multiple user chips */
        if (!empty($chips)) {
            $userId = $user->id;
            foreach ($chips as $key => $value) {
                UserChip::create(['user_id' => $userId, 'chips' => $chips[$key]]);
            }
        }
    }


    public static function update($userId, $chips)
    {
        $user = User::find($userId);
        /* Insert multiple user comments */
        if (!empty($chips)) {
            // $userId = $user->id;
            UserChip::where('user_id', $userId)->delete();
            foreach ($chips as $key => $value) {
                UserChip::create(['user_id' => $userId, 'chips' => $chips[$key]]);
            }
        }
    }
}
