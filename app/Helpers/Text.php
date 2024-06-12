<?php

namespace App\Helpers;

class Text {

    public static function generatePass( int $long ) {

        $pass    = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ_-.';
        $size    = strlen($pattern)-1;
        for( $i = 0; $i < $long; $i++ ){
            $rand_index = random_int(0, $size );
            $pass      .= $pattern[ $rand_index ];
        }
        return $pass;
    }

}
