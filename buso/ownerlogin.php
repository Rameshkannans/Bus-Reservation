<?php
include('../admin/db.php');
$db = new Database($servername, $username, $password, $dbname);
session_start();

class ownerregcontrol {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($owemail, $password) {
        $owemail = mysqli_real_escape_string($this->conn, $owemail);
        $password = mysqli_real_escape_string($this->conn, $password);

        $select_value1 = "SELECT * FROM owner WHERE email='$owemail' AND confirm_password='" . md5($password) . "'";
        $oadminlogin = mysqli_query($this->conn, $select_value1);

        $num_of_rows = mysqli_num_rows($oadminlogin);
        if ($num_of_rows == 1) {
            $fetch_rows1 = $oadminlogin->fetch_assoc();
            header("Location: busdeatailsdash.php");
            $_SESSION['ownerid'] = $fetch_rows1['id'];
            $_SESSION['ownername'] = $fetch_rows1['name'];
            $_SESSION['owneremail'] = $fetch_rows1['email'];
            $_SESSION['ownerphone'] = $fetch_rows1['phone_number'];
            $_SESSION['owneraddress'] = $fetch_rows1['address'];
            $_SESSION['ownercompanyname'] = $fetch_rows1['company_name'];
            $_SESSION['ownerdp'] = $fetch_rows1['profile_photo'];
            $_SESSION['ownerpass'] = $fetch_rows1['password'];
            $_SESSION['ownercpass'] = $fetch_rows1['confirm_password'];
             return true;
        } else {
            return false;
        }
    }
}


if (isset($_POST['ownerlogin'])) {
    $owemail = $_POST['owemail'];
    $password = $_POST['owcpass'];
    $admins = new ownerregcontrol($db->conn);
    $user = $admins->create($owemail, $password);
}






?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Owner Login</title>
  <link rel="stylesheet" type="text/css" href="pro52.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
     @import url('https://fonts.googleapis.com/css2?family=Grand+Hotel&display=swap');
  body {
  background-image: url('img12.jpg');
  background-size: cover; 
  background-attachment: fixed; 
  background-repeat: no-repeat;
}
#b1:hover {
      background-color: orange; 
    }
</style>

</head>
<body>
    <!-- NAvigation Bar end -->
    <nav class="navbar navbar-expand-sm bg-transparent shadow navbar-dark px-1 " style="position: fixed; top: 0; width: 100%; z-index: 1000;">
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
                      <a class="nav-link text-secondary text-center px-4" style="font-size: 17px;" id="b1" href="/rese/customer/customerdash.php"><b>D a s h b o a r d</b> </a>
                  </li> 
                    </ul>
                    
                    
          </div>
        </div>
      </nav>
  <!-- NAvigation Bar end -->



        <div class="container " style="margin-top: 100px;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card  shadow-lg bg-transparent">
                    <h1 class="card-header text-center  display-4" style="font-family: 'Grand Hotel', cursive; color:orange;">
                        Owner Login
                    </h1>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label text-warning" style="font-size: 20px;"><b>Username :</b> </label>
                                <input type="text" class="form-control" id="name" name="owemail" required>
                            </div>
                            <div class="mb-3">
                                <label for="passwords" class="form-label text-warning" style="font-size: 20px;"><b >Password :</b> </label>
                                <input type="password" class="form-control" id="passwords" name="owcpass" required>
                            </div>
                            <div class="d-grid">
                            <button type="submit" name="ownerlogin" class="btn btn-outline-success"><b>Login</b></button>
                            </div>

                            
                            <div class="text-center mt-4">        
                              <h6 class="link text-light">Don't have an account? <a href="ownerreg.php" class="btn btn-outline-warning ">Register here</a></h6>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




</body>
</html>