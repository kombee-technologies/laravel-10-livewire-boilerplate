<?php

namespace App\Http\Controllers;

use App\Models\UserComment;
use App\Models\User;

class CommentController extends Controller
{


    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public static function store($user, $comments)
    {

        /* Insert multiple user comments */
        if (!empty($comments)) {
            $userId = $user->id;
            foreach ($comments as $key => $value) {
                UserComment::create(['user_id' => $userId, 'comment' => $comments[$key]]);
            }
        }
    }

    public static function update($userId, $comments)
    {
        $user = User::find($userId);
        /* Insert multiple user comments */
        if (!empty($comments)) {
            // $userId = $user->id;
            UserComment::where('user_id', $userId)->delete();
            foreach ($comments as $key => $value) {
                UserComment::create(['user_id' => $userId, 'comment' => $comments[$key]]);
            }
        }
    }
}
