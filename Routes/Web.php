<?php

    namespace Routes;

    use App\View\View;
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

            Router::get("/", function () {
                
                $values = [
                    "name" => "user1",
                    "email" => "user@gmail.com",
                    "password" => "password123"
                ];

                QueryBuilder::build("INSERT INTO `users` ", null, $values);

            });

        }

     }