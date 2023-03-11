<?php

namespace App\Http\Controllers;

use App\Models\UserGallery;

class UserGalleryController extends Controller
{


    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public static function store($user, $galleries)
    {
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
}
