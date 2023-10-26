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
}
