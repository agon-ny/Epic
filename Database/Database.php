<?php

    namespace Database;

use Exception;
use PDO;
use PDOException;

    /**
     * This class handles the connection to the database most
     * used by Models, but can also be used prettymuch anywhere
     */

    class Database
    {

        // Variable to store a PDO instance
        public static $pdo;

        public static function connect() {

            // Cleaning all pdo connections to perform a brand new one
            self::$pdo = null;

            // Retrieving all required info from .env file
            $database = $_ENV["DATABASE_CONNECTION"];
            $host = $_ENV["HOST"];
            $dbName = $_ENV["DBNAME"];
            $user = $_ENV["USER"];
            $password = $_ENV["PASSWORD"];

            // Trying to build a new connection handleing errors
            try {

                // Checking if a pdo instance already exists, if so throw an error: Too many connections
                if (!self::$pdo) {
                    self::$pdo = new PDO($database . ":host=" . $host . ";dbname=" . $dbName, $user, $password);
                } else {
                    throw new Exception("Too many database connections");
                }

            } catch (PDOException $e) {
                return "Error: " . $e->getMessage();
                die();
            }

            // Returning the pdo instance
            return self::$pdo;
    

        }

    }