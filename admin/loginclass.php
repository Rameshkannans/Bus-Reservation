<?php


class adminregcontrol {

    public function __construct() {
         $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "busreservation";
            // $databaseManager = new Database($servername, $username, $password, $dbname);
            $this->conn = new mysqli($servername, $username, $password,$dbname);

                    if ($this->conn->connect_error) {
                        die("Connection failed: " . $this->conn->connect_error);
                    }
    }

    public function create($username, $password) {
        $ausername = mysqli_real_escape_string($this->conn, $username);
        $apassword = mysqli_real_escape_string($this->conn, $password);

        $select_value = "SELECT * FROM admin WHERE company_id='$ausername' AND confirm_password='" . md5($apassword) . "'";
        $adminlogin = mysqli_query($this->conn, $select_value);

        $num_of_rows = mysqli_num_rows($adminlogin);
        if ($num_of_rows == 1) {
            $fetch_rows = $adminlogin->fetch_assoc();
            $_SESSION['adminid'] = $fetch_rows['id'];
            $_SESSION['adminname'] = $fetch_rows['name'];
            $_SESSION['adminemail'] = $fetch_rows['email'];
            $_SESSION['adminphone'] = $fetch_rows['phone_number'];
            $_SESSION['adminaddress'] = $fetch_rows['address'];
            $_SESSION['admincompanyid'] = $fetch_rows['company_id'];
            $_SESSION['apdmindp'] = $fetch_rows['profile_photo'];
            return $fetch_rows;
        } else {
            return false;
        }
    }
}
?>
