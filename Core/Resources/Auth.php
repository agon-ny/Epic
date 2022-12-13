<?php

    namespace Core\Resources;

    use App\Models\UserModel;
    use Core\Interfaces\AuthInterface;

    class Auth implements AuthInterface
    {

        public static function authenticate(UserModel $user) {
            
        }

        public static function unAuthenticate(UserModel $user) {

        }

        public static function isAuth() {
            
        }

    }