<?php

namespace App\Helpers;

class Text {

    public static function generatePass() {

        $pass    = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ_-.';
        $size    = strlen($pattern)-1;
        $long    = 12;
        for( $i = 0; $i < $long; $i++ ){
            $rand_index = random_int(0, $size );
            $pass      .= $pattern[ $rand_index ];
        }
        return $pass;
    }

}
