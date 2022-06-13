<?php

    namespace RodyDB\Core;

    class Helper {
        public static function generateUUID(){
            return md5(uniqid(rand(), true));
        }

        public static function generateID($length){
            return $length + 1;
        }

        public static function generateKey($keyType, $length = 0){
            if($keyType == 'uuid'){
                return self::generateUUID();
            }
            return self::generateID($length);
        }
    }