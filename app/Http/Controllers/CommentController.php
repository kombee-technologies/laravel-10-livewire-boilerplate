<?php

namespace App\Http\Controllers;

use App\Models\UserComment;

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
}
