<?php

    namespace Database;

    /**
     * This class is responsable for every single database connection
     * stablished :)
     */

    class QueryBuilder extends Database
    {

        public static function build(String $query, Array|null $conditionalValues , Array|null $values):object {

            // Prepare the given query
            $sql = self::connect()->prepare($query);

            // if values exists
            if ($values) {
                
                // check if conditional values exist
                if($conditionalValues) {

                    // Loop throught conditionals to push them into values
                    // and be able to build an array of values accetable by the
                    // query PDO's execute method
                    foreach($conditionalValues as $value){
                        array_push($values, $value);
                    }

                    $values = array_values($values);
                    $sql->execute($values);
                    return $sql;
                }

                // if there is no condition just run with values
                $values = array_values($values);
                $sql->execute($values);
                return $sql;

            }

            // Check if there is only conditional values
            // if so execute em alone
            if($conditionalValues) {
                $conditionalValues = array_values($conditionalValues);
                $sql->execute($conditionalValues);
                return $sql;
            }

            // executing with no values
            $sql->execute();

            return $sql;
        }

    }