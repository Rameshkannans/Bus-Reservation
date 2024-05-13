<?php
session_start();
class customercontrol {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($cusmail, $cuspassword) {
        $cusmail = mysqli_real_escape_string($this->conn, $cusmail);
        $cuspassword = mysqli_real_escape_string($this->conn, $cuspassword);

        $select_value1 = "SELECT * FROM customers WHERE email='$cusmail' AND confirm_password='" . md5($cuspassword) . "'";
        $oadminlogin = mysqli_query($this->conn, $select_value1);

        $num_of_rows = mysqli_num_rows($oadminlogin);
        if ($num_of_rows == 1) {
            $fetch_rows = $oadminlogin->fetch_assoc();
            $_SESSION['cusid'] = $fetch_rows['id'];
            $_SESSION['cusname'] = $fetch_rows['name'];
            $_SESSION['cusemail'] = $fetch_rows['email'];
            $_SESSION['cusphone'] = $fetch_rows['phone_number'];
            $_SESSION['cusaddress'] = $fetch_rows['address'];
            $_SESSION['cuscity'] = $fetch_rows['city'];
            $_SESSION['cusstate'] = $fetch_rows['state'];
            $_SESSION['cuspin'] = $fetch_rows['pincode'];
            $_SESSION['cusdob'] = $fetch_rows['date_of_birth'];
            $_SESSION['cusdp'] = $fetch_rows['profile_photo'];
            // $_SESSION['cuspass'] = $fetch_rows['password'];
            // $_SESSION['cuscpass'] = $fetch_rows['confirm_password'];

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
  <title>Customer Login</title>
  <link rel="stylesheet" type="text/css" href="pro1.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
     @import url('https://fonts.googleapis.com/css2?family=Grand+Hotel&display=swap');
    body {
  background-image: url('img6.jpg');
  background-size: cover; 
  background-attachment: fixed; 
  background-repeat: no-repeat;
}
 #b1:hover {
      background-color: #95a69e; 
    }
  </style>
</head>
<body>

  <!-- NAvigation Bar end -->
    <nav class="navbar navbar-expand-sm bg-transparent shadow navbar-dark px-1" style="position: fixed; top: 0; width: 100%; z-index: 1000;">
        <div class="container-fluid">
            <ul class="navbar-nav ">
              <li class="nav-item">
                <a class="nav-link text-dark text-center px-4" style="font-size: 17px;" ><h4 style="font-family: 'Grand Hotel', cursive;" class="text-warning">Travel</h4></a>
              </li></ul> 
              <button class="navbar-toggler bg-warning" type="button" data-bs-toggle="collapse" data-bs-target="#rks">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="rks">
                  <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                      <a class="nav-link text-white text-center px-4" style="font-size: 17px;" id="b1" href="customerdash.php">D a s h b o a r d</a>
                  </li> 
                   
                    
          </div>
        </div>
      </nav>
  <!-- NAvigation Bar end -->


<div class="container-fluid" style="margin-top: 100px;">
  <div class="row justify-content-center">

      <div class="col-lg-5 col-sm-12 bg-transparent ms-4 me-5  p-2">
        <div class="card p-2 shadow-lg bg-transparent"  style="border:white solid 1px;">
          <h3 class="card-header display-4 text-center " style="font-family: 'Grand Hotel', cursive; color: whitesmoke;" ><b>Customer Login</b></h3>
          <form action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12 pt-2">
              <div class="mb-3">
                <label for="user" class="form-label " style="font-size: 20px;color:#d1993f;"><b>User Name :</b></label>
                <input type="text" id="user" name="cusna" class="form-control" required>
              </div>
            </div>
              <div class="col-sm-12 pt-2">
              <div class="mb-3">
                <label for="userpa" class="form-label " style="font-size: 20px; color:#d1993f;"><b>Password :</b></label>
                <input type="password" id="userpa" name="cuspa" class="form-control" required>
              </div>
            </div>

            <div class="d-grid">
              <button type="submit" name="customerlog" class="btn btn-outline-success"><b> Login</b></button>
            </div>
                      
            <div class="text-center mt-4">        
              <h6 class="link text-light">Don't have an account? <a href="cusreg.php" class="btn btn-outline-warning ">Register here</a></h6>
            </div>

          </div>
        </form>
        </div>
      </div>
     

  </div>
</div>





<?php

include('../admin/db.php');
$db = new Database($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cusna']) && isset($_POST['cuspa'])) {
    $cusmail = $_POST['cusna'];
    $cuspassword = $_POST['cuspa'];

    $admins = new customercontrol($db->conn);
    if ($admins->create($cusmail, $cuspassword)) {
        header("Location: cusbooking.php"); 
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