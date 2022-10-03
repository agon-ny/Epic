<?php

    namespace Core\Resources;

    class Encryption
    {

        public static function encrypt(String $password):String {
  
            $hash = password_hash($password, PASSWORD_DEFAULT, array('cost' => 10));

            return $hash;

        }

        public static function verifyEncrypted(String $check, String $hash):bool {

            $unhash = password_verify($check, $hash);

            return ($unhash) ? true : false;

        }

    }