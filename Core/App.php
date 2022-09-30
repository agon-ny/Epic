<?php

    namespace Core;

    use Core\Resources\Request;
    use Core\Resources\Router;

    /**
     * This is the App class wich is responsable for bootstraping
     * all the application, it bootstraps everything using a
     * construct method called when we instantiate it in Index.php :)
     */

    class App 
    {

        public function bootstrap() {

            // Bootstraping external packages
            $this->bootstrapExternalPackages();

            // Get information about the current request
            Request::dispatch();

            // Set all defined routes and dispatch them to the signed URI
            Router::dispatch();
        }

        public function bootstrapExternalPackages() {

            // Initializing "vlucas/phpdotenv"
            $dotenv = \Dotenv\Dotenv::createImmutable("../");
            $dotenv->load();

        }


    }