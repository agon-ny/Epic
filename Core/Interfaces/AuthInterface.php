<?php

    namespace Core\Interfaces;

    use App\Models\UserModel;

    interface AuthInterface
    {

        public static function authenticate(UserModel $user);

        public static function unAuthenticate(UserModel $user);

        public static function isAuth();

    }