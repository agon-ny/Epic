<?php

    namespace App\Models;

    use Database\QueryBuilder;

    /**
     * Every single model should extend this one to get access
     * to the QueryBuilder and then be able to perform actions to database
     */

    class Model 
    {
        
        // Save data about the current model instance
        public $collumn;

        function __construct(Int $id = null)
        {   
            // store all information about the current instance
            if($id) {
                $this->collumn = $this->find($id);
            }

        }

        // Retrieve all database records from a table
        public function all():array {
            $table = $this->table;
            $query = "SELECT * FROM `$table` ";

            $data = QueryBuilder::build($query, null, null)->fetchAll();

            return $data;
        }

        // Retrieve a single record based on id
        public function find(Int $id):array {
            $table = $this->table;
            $query = "SELECT * FROM `$table` WHERE `id` = ? ";

            $data = QueryBuilder::build($query, array($id), null)->fetch();

            return $data;
        }

        // Create a new database record
        public function create(Array $values):object {

            $table = $this->table;
            $query = "INSERT INTO `$table` VALUES(null, ";
            $counter = 0;

            foreach($values as $key => $value) {
                $counter++;
                $query.= " ?";
                if(count($values) > $counter) {
                    $query.= ",";
                } else {
                    $query.= ")";
                }
            }

            $builder = QueryBuilder::build($query, null, $values);

            return $builder;
        }

        // Update a database record
        public function update(Array $values):object {

            $table = $this->table;
            $id = $this->collumn['id'];

            $query = "UPDATE `$table` SET ";
            $counter = 0;

            foreach($values as $key => $value) {
                $counter++;
                $query.= " `$key` = ?";
                if(count($values) > $counter) {
                    $query.= ",";
                } else {
                    $query.= " WHERE `id` = ? ";
                }
            }

            $builder = QueryBuilder::build($query, array($id), $values);

            return $builder;
        }

        // Delete a record from database
        public function delete():object {

            $table = $this->table;
            $id = $this->collumn['id'];

            $query = "DELETE FROM `$table` WHERE `id` = ? ";

            $builder = QueryBuilder::build($query, array($id), null);

            return $builder;
        }

     }