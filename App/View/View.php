<?php

    namespace App\View;

    use Exception;

    /**
     * This class is responsable for rendering views
     */

    class View
    {

        public static function render(String $path, Array|null $data = null) {

            // Check if the view needs a data
            if($data) {
                extract($data);
            };

            // Saving the view's path
            $viewPath = "../Views/" . $path . ".php";

            // Check if it exists if not throw an error
            if (file_exists($viewPath)) {
                include($viewPath);
            } else {
                throw new Exception("View was not found");
            };

        }

    }