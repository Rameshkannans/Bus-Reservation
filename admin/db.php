<?php
class Database {

    public $conn;

    public function __construct($servername, $username, $password, $dbname) {
        $this->conn = new mysqli($servername, $username, $password);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        // echo "Database Connection Successfully";
        $this->createDatabase($dbname);
        $this->conn->select_db($dbname);
    }

    private function createDatabase($dbname) {
        $dbcreate = "CREATE DATABASE IF NOT EXISTS $dbname";
        if ($this->conn->query($dbcreate) === TRUE) {
            // echo "Database created successfully";
        } else {
            echo "Error creating database: " . $this->conn->error;
        }
    }


    public function createTable($table1) {
        if ($this->conn->query($table1) === TRUE) {
            // echo "Table created successfully";
        } else {
            echo "Error creating table: " . $this->conn->error;
        }
    }

    public function createTable1($table2) {
        if ($this->conn->query($table2) === TRUE) {
            // echo "Table created successfully";
        } else {
            echo "Error creating table: " . $this->conn->error;
        }
    }

    public function createTable2($table3) {
        if ($this->conn->query($table3) === TRUE) {
            // echo "Table created successfully";
        } else {
            echo "Error creating table: " . $this->conn->error;
        }
    }

    public function createTable3($bustable) {
        if ($this->conn->query($bustable) === TRUE) {
            // echo "Table created successfully";
        } else {
            echo "Error creating table: " . $this->conn->error;
        }
    }

     public function createTable4($busbook) {
        if ($this->conn->query($busbook) === TRUE) {
            // echo "Table created successfully";
        } else {
            echo "Error creating table: " . $this->conn->error;
        }
    }


    //  public function forgin($forkey) {
    //    if ($this->conn->query($forkey) === TRUE) {
    //         // echo "Table created successfully";
    //     } else {
    //         echo "Error creating table: " . $this->conn->error;
    //     }
    // }


    public function closeConnection() {
        $this->conn->close();
    }
}

// DATABASE CONNECTION AND DATABASE CREATION
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "busreservation";
$databaseManager = new Database($servername, $username, $password, $dbname);


// TABLE1 (ADMIN) CRAETION
$table1 ="CREATE TABLE IF NOT EXISTS admin (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            phone_number VARCHAR(20) NOT NULL,
            address VARCHAR(255),
            company_id VARCHAR(15),
            password VARCHAR(255) NOT NULL,
            confirm_password VARCHAR(255) NOT NULL,
            profile_photo VARCHAR(255)
        )";
$databaseManager->createTable($table1);


//TABLE2 (OWNER) CRAETION
$table2 ="CREATE TABLE IF NOT EXISTS owner (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            phone_number VARCHAR(20) NOT NULL,
            address VARCHAR(255),
            company_name VARCHAR(15),
            password VARCHAR(255) NOT NULL,
            confirm_password VARCHAR(255) NOT NULL,
            profile_photo VARCHAR(255)
        )";
$databaseManager->createTable1($table2);



        $table3 = "CREATE TABLE IF NOT EXISTS customers (
            ownid INT NOT NULL,
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            phone_number VARCHAR(15),
            address VARCHAR(255),
            city VARCHAR(255),
            state VARCHAR(255),
            pincode VARCHAR(10),
            date_of_birth DATE,
            profile_photo VARCHAR(255),
            password VARCHAR(255) NOT NULL,
            confirm_password VARCHAR(255) NOT NULL
        )";
$databaseManager->createTable1($table3);

        $bustable = "CREATE TABLE IF NOT EXISTS buses (
            busid INT PRIMARY KEY AUTO_INCREMENT,
            id INT NOT NULL,
            bus_number INT NOT NULL,
            bus_name VARCHAR(255) NOT NULL,
            bus_model VARCHAR(255) NOT NULL,
            ac  VARCHAR(255) NOT NULL,
            license VARCHAR(255) NOT NULL,
            insurance  VARCHAR(255) NOT NULL,
            sleeper  VARCHAR(255) NOT NULL,
            route_from VARCHAR(255) NOT NULL,
            route_to VARCHAR(255) NOT NULL,
            start_time TIME NOT NULL,
            how_long TIME NOT NULL,
            bus_photo VARCHAR(255) NOT NULL,
            tdate date NOT NULL
        )";
$databaseManager->createTable3($bustable);


$busbook = "CREATE TABLE IF NOT EXISTS booking (
    cusid INT NOT NULL,
    bookingid INT AUTO_INCREMENT PRIMARY KEY,  
    cprofile VARCHAR(255),
    cemail VARCHAR(255) NOT NULL,
    cname VARCHAR(255) NOT NULL,
    bid INT NOT NULL,
    busnumber INT NOT NULL,
    busname VARCHAR(255) NOT NULL,
    bac VARCHAR(255) NOT NULL,
    bsleeper VARCHAR(255) NOT NULL,
    broute_from VARCHAR(255) NOT NULL,
    broute_to VARCHAR(255) NOT NULL,
    bstart_time TIME NOT NULL,
    btdate DATE NOT NULL, 
    bookingseats INT NOT NULL,
    seatquantity INT NOT NULL,
    totaamount INT NOT NULL,  
    oemail VARCHAR(255) NOT NULL,
    oname VARCHAR(255) NOT NULL,
    onumber VARCHAR(255) NOT NULL
)";

$databaseManager->createTable4($busbook);
// $addIdColumn = "ALTER TABLE booking ADD COLUMN id INT";
// $databaseManager->createTable4($addIdColumn);

// $forkey = "ALTER TABLE booking ADD FOREIGN KEY (id) REFERENCES customers (id)";
// $databaseManager->forgin($forkey);


$databaseManager->closeConnection();
?>

