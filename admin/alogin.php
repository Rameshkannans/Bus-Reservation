<?php
class adminregcontrol {
    public $conn;

    public function __construct($conn) {
        $this->conn = $conn;
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
            return true;
        } else {
            return false;
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Login</title>
  <link rel="stylesheet" type="text/css" href="pro52.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
     @import url('https://fonts.googleapis.com/css2?family=Grand+Hotel&display=swap');
  body {
  background-image: url('img2.jpg');
  background-size: cover; 
  background-attachment: fixed; 
  background-repeat: no-repeat;
}
</style>

</head>
<body>

  <div class="container-fluid bg-transparent p-2 rounded-5 px-5 ">
        <div class="row ">
            <div class="col-6  p-2">
                <div class="float-start">
                <a class="nav-link text-dark text-center px-4" style="font-size: 17px;"><h4 style="font-family: 'Grand Hotel', cursive;" class="text-warning">Travel</h4></a>
                </div>
            </div>
            <div class="col-6  p-2 mx-auto mt-4">
                <div class="float-end">
                    <!-- <h1><b class="text-light" >Company Name</b></h1> -->
                </div>
            </div>
        </div>
    </div>


        <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card  shadow-lg bg-transparent">
                    <h1 class="card-header text-center text-dark">
                        ADMIN LOG IN
                    </h1>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="ausername" class="form-label text-secondary"><b>Username :</b> </label>
                                <input type="text" class="form-control" id="ausername" name="adusername" required>
                            </div>
                            <div class="mb-3">
                                <label for="apassword" class="form-label text-secondary"><b>Password :</b> </label>
                                <input type="password" class="form-control" id="apassword" name="adpassword" required>
                            </div>
                            <div class="d-grid">
                            <button type="submit" name="adlogin" class="btn btn-outline-success"><b>Login</b></button>
                            </div>

                            
                            <div class="text-center mt-4">        
                              <h6 class="link">Don't have an account? <a href="areg.php" class="btn btn-outline-warning ">Register here</a></h6>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




<?php
session_start();

include('db.php');
$db = new Database($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['adusername']) && isset($_POST['adpassword'])) {
    $username = $_POST['adusername'];
    $password = $_POST['adpassword'];

    $admins = new adminregcontrol($db->conn);
    if ($admins->create($username, $password)) {
        header("Location: admin.php"); 
    } else {
        echo "
        <div class='row justify-content-center mt-5'>
            <div class='col-lg-6'>
                <div class='card bg-transparent shadow'>
                    <h1 class='text-center text-white'>INVALID USERNAME OR PASSWORD</h1>
                </div>
            </div>
        </div>
        ";
    }
}

?>
</body>
</html>