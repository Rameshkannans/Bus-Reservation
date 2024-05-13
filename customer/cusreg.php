
<?php
 session_start();
include('../admin/db.php');
$db = new Database($servername, $username, $password, $dbname);

if(isset($_POST['cussubmit'])) {
    $inputData = [
        'cusname' => mysqli_real_escape_string($db->conn, $_POST['cusname']),
        'cusmail' => mysqli_real_escape_string($db->conn, $_POST['cusmail']),
        'cusphone' => mysqli_real_escape_string($db->conn, $_POST['cusphone']),
        'cusaddress' => mysqli_real_escape_string($db->conn, $_POST['cusaddress']),
        'cuscity' => mysqli_real_escape_string($db->conn, $_POST['cuscity']),
        'cusstate' => mysqli_real_escape_string($db->conn, $_POST['cusstate']),
        'cusspin' => mysqli_real_escape_string($db->conn, $_POST['cusspin']),
        'cusdob' => mysqli_real_escape_string($db->conn, $_POST['cusdob']),
        'profile' => $_FILES['cusddp']['name'],
        'file_temp_path' => $_FILES['cusddp']['tmp_name'],
        'cuspassword' => mysqli_real_escape_string($db->conn, $_POST['cuspassword']),
        'cuscpassword' => mysqli_real_escape_string($db->conn, $_POST['cuscpassword']), 

    ];

    $admins = new customerregcontrol($db->conn);
    $results = $admins->create($inputData);

    if ($results) {
        header("Location: cuslogin.php");
        exit(0);
    } else {
        header("Location: cuswrongpass.php");
        exit(0);
    }
}




class customerregcontrol {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function create($inputData) {
        $cusname = $inputData['cusname'];
        $cusmail = $inputData['cusmail'];
        $cusphone = $inputData['cusphone'];
        $cusaddress = $inputData['cusaddress'];
        $cuscity = $inputData['cuscity'];
        $cusstate = $inputData['cusstate'];
        $cusspin = $inputData['cusspin'];
        $cusdob = $inputData['cusdob'];
        $cuspassword = $inputData['cuspassword'];
        $cuscpassword = $inputData['cuscpassword'];

        
        
        $profile = $inputData['profile'];
        $file_tmp_path = $inputData['file_temp_path'];

        $storage_path = "customer_profile/" . $profile;
        move_uploaded_file($file_tmp_path, $storage_path);


        if ($cuspassword == $cuscpassword) {

        $cQuery = "INSERT INTO customers (name, email, phone_number, address, city, state, pincode, date_of_birth, profile_photo, password, confirm_password) VALUES ('$cusname','$cusmail','$cusphone','$cusaddress','$cuscity', '$cusstate', '$cusspin','$cusdob','$storage_path','".md5($cuspassword)."','".md5($cuscpassword)."')";

        $cadminregister = mysqli_query($this->conn, $cQuery);
        if ($cadminregister) {
            return true;
        }
      }
      else{
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
  <title>Customer Registration</title>
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
                    </ul>
                    
          </div>
        </div>
      </nav>
  <!-- NAvigation Bar end -->


<div class="container-fluid" style="margin-top: 100px;">
  <div class="row">

      <div class="col-lg-8 col-sm-12 bg-transparent ms-4 me-5  p-2">
        <div class="card p-2 shadow-lg bg-transparent" style="border:white solid 1px;">
          <h3 class="card-header display-4 text-center"style="font-family: 'Grand Hotel', cursive; color: white;" ><b>Customer Registration</b></h3>
          <form action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12 pt-2">
              <div class="mb-3">
                <label for="cname" class="form-label " style="font-size: 20px;color:#d1993f;"><b>Name :</b></label>
                <input type="text" id="cname" name="cusname" class="form-control" required>
              </div>
            </div>
              <!-- <div class="col-sm-6 pt-2">
              <div class="mb-3">
                <label for="name" class="form-label text-info"><b>Last Name :</b></label>
                <input type="text" id="name" name="nam" class="form-control" required>
              </div>
            </div> -->
            <div class="col-sm-6 pt-2">
              <div class="mb-3">
                <label for="cmail" class="form-label " style="font-size: 20px;color:#d1993f;"><b>Email :</b></label>
                <input type="email" id="cmail" name="cusmail" class="form-control" required>
              </div>
            </div>
            <div class="col-sm-6 pt-2">
              <div class="mb-3">
                <label for="cph" class="form-label " style="font-size: 20px;color:#d1993f;"><b>Phone :</b></label>
                <input type="tel" id="cph" name="cusphone" class="form-control" required>
              </div>
            </div>
            <div class="col-sm-12 pt-2">
              <div class="mb-3">
                <label for="cadd" class="form-label " style="font-size: 20px;color:#d1993f;"><b>Address :</b></label>
                <input type="text" id="cadd" name="cusaddress" class="form-control" required>
              </div>
            </div>
            <div class="col-sm-12 pt-2">
              <div class="mb-3">
                <label for="ccity" class="form-label " style="font-size: 20px;color:#d1993f;"><b>City :</b></label>
                <input type="text" id="ccity" name="cuscity" class="form-control" required>
              </div>
            </div>
            <div class="col-sm-12 pt-2">
              <div class="mb-3">
                <label for="cst" class="form-label " style="font-size: 20px;color:#d1993f;"><b>State :</b></label>
                <input type="text" id="cst" name="cusstate" class="form-control" required>
              </div>
            </div>
            <div class="col-sm-6 pt-2">
              <div class="mb-3">
                <label for="cpin" class="form-label " style="font-size: 20px;color:#d1993f;"><b>Pincode :</b></label>
                <input type="number" id="cpin" name="cusspin" class="form-control" required>
              </div>
            </div>
            <div class="col-sm-6 pt-2">
              <div class="mb-3">
                <label for="cd" class="form-label " style="font-size: 20px;color:#d1993f;"><b>Date Of Birth :</b></label>
                <input type="date" id="cd" name="cusdob" class="form-control" required>
              </div>
            </div>
            <div class="col-sm-12 pt-2">
              <div class="mb-3">
                <label for="cdp" class="form-label " style="font-size: 20px;color:#d1993f;"><b>Profile Photo :</b></label>
                <input type="file" id="cdp" name="cusddp" class="form-control" accept="image/*" required>
              </div>
            </div>
            <div class="col-sm-6 pt-2">
              <div class="mb-3">
                <label for="cpass" class="form-label " style="font-size: 20px;color:#d1993f;"><b>Password :</b></label>
                <input type="password" id="cpass" name="cuspassword" class="form-control" required>
              </div>
            </div>
            <div class="col-sm-6 pt-2">
              <div class="mb-3">
                <label for="ccpass" class="form-label" style="font-size: 20px;color:#d1993f;"><b>Retype Password :</b></label>
                <input type="password" id="ccpass" name="cuscpassword" class="form-control" required>
              </div>
            </div>

            <div class="d-grid">
              <button type="submit" name="cussubmit" class="btn btn-outline-success"><b> Register</b></button>
            </div>
                      
            <div class="text-center mt-4">        
              <h6 class="link text-light">Already have an account? <a href="cuslogin.php" class="btn btn-outline-warning "><b>Login here</b> </a></h6>
            </div>

          </div>
        </form>
        </div>
      </div>
     

      <div class="col-lg-3 col-sm-12 bg-transparent mb-5 p-2">
            <div class="card shadow-lg bg-transparent">
              <div class="card-body">
                <!-- Carousel -->
                  <div id="demo" class="carousel slide" data-bs-ride="carousel">

                    <!-- Indicators/dots -->
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                      <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
                      <button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>
                      <button type="button" data-bs-target="#demo" data-bs-slide-to="5"></button>
                    </div>
                    
                    <!-- The slideshow/carousel -->
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="b1.jpg" alt="Los Angeles" class="d-block" style="width:100%">
                        <div class="carousel-caption">
                          <h3></h3>
                          <p></p>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="b2.jpg" alt="Chicago" class="d-block" style="width:100%">
                        <div class="carousel-caption">
                          <h3></h3>
                          <p></p>
                        </div> 
                      </div>
                      <div class="carousel-item">
                        <img src="b3.jpg" alt="New York" class="d-block" style="width:100%">
                        <div class="carousel-caption">
                          <h3></h3>
                          <p></p>
                        </div>  
                      </div>
                      <div class="carousel-item">
                        <img src="b4.jpg" alt="New York" class="d-block" style="width:100%">
                        <div class="carousel-caption">
                          <h3></h3>
                          <p></p>
                        </div>  
                      </div>
                      <div class="carousel-item">
                        <img src="b5.jpg" alt="New York" class="d-block" style="width:100%">
                        <div class="carousel-caption">
                          <h3></h3>
                          <p></p>
                        </div>  
                      </div>
                      <div class="carousel-item">
                        <img src="b6.jpg" alt="New York" class="d-block" style="width:100%">
                        <div class="carousel-caption">
                          <h3></h3>
                          <p></p>
                        </div>  
                      </div>
                    </div>
                    
                    <!-- Left and right controls/icons -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                      <span class="carousel-control-next-icon"></span>
                    </button>
                  </div>
              </div>
            </div>
        

      </div>

  </div>
</div>
</body>
</html>