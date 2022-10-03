<?php

    namespace Routes;

use App\Models\UserModel;
use App\View\View;
use Core\Resources\Encryption;
use Core\Resources\Router;
use Database\QueryBuilder;

    /**
     * Here you can register any route 
     * you need :) 
     * Use the Router resource to define GET,POST,PUT or DELETE routes
     */

     class Web
     {

        // Register all routes inside this function!
        public static function set():void {

            Router::get("/", function ($params) {
                View::render("home");
            });

        }

     }