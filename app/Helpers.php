<?php

namespace App\Helpers;


class Helper {

   public static function generateOTP(){
       return app()->environment('production') ? rand(100000, 999999) : '123456';
   }
}
