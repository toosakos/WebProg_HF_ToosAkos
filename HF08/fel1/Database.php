<?php

class Database
{
    private string $host = "localhost";
    private string $user = "root";
    private string $password = "";
    private string $dbname = "egyetem";

    public function connect(){
        $conn = mysqli_connect($this->host, $this->user, $this->password, $this->dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
}