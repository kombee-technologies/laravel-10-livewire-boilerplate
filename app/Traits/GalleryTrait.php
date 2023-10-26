<?php
namespace App\Traits;

use App\Models\UserGallery;

trait GalleryTrait {

    /**
     * @param $user
     * @param $galleries
     * @return void
     */
    public function galleriesStore($user, $galleries){

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
