<?php

    class Employee{

        private $serverName = "localhost";
        private $userName = "root";
        private $password = "root";
        private $dbName = "oops";
        public $connection;

        // constructor
        public function __construct(){
            $this -> connection = new mysqli($this -> serverName, $this -> userName, $this -> password, $this -> dbName);
            
            if ($this -> connection -> connect_error) {
                die("Connection failed: " . $this -> connection -> connect_error);
              }
        }

        // view all data in home
        public function viewHome(){
            
            $homeQuery = "SELECT * FROM employee";
            $viewResult = $this -> connection ->query($homeQuery);
            while($row = $viewResult -> fetch_assoc()){
                $homeRow[] = $row;
            } 
            
            return $homeRow;
        }

        //create
        public function createEmployee($data){

            $createQuery = "INSERT INTO employee (name, address, city, gender, salary, skills)
                            VALUES('".$data['name']."','".$data['address']."','".$data['city']."','".$data['gender']."','".$data['salary']."','".implode(", ",$data['skill']) ."') ";

            $createResult = $this -> connection -> query($createQuery);

            return $createResult;
    
        }

        //update
        public function updateEmployee($data,$id){

            $updateQuery = "UPDATE employee SET name = '".$data['name']."', address = '".$data['address']."', city='".$data['city']."',
                            gender='".$data['gender']."', salary = '".$data['salary']."', skills='".implode(", ",$data['skill']) ."' WHERE id = '".$id['id']."'";

            $updateResult = $this -> connection -> query($updateQuery);
            
            return $updateResult;
        
        }

        // current data in update
        public function showUpdate($id){
        
            $showUpdateQuery = "SELECT * FROM employee WHERE id = $id";
            $showUpdateResult = $this -> connection -> query($showUpdateQuery);
            $showUpdateRow = $showUpdateResult -> fetch_assoc();

            return $showUpdateRow;
            
        }

        // view
        public function viewEmployee($id){

            $viewQuery = "SELECT * FROM employee where id=$id";
            $viewResult = $this -> connection -> query($viewQuery);
            $viewRow = $viewResult -> fetch_assoc();

            return $viewRow;
        }

        // delete
        public function deleteEmployee($id){
            
            $deleteQuery = "DELETE FROM employee WHERE id='$id'";
            $this -> connection -> query($deleteQuery);
        }
    }

?>