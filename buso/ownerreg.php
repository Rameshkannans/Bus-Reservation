

<?php
session_start();

include('../admin/db.php');
$db = new Database($servername, $username, $password, $dbname);

if(isset($_POST['owsubmit'])) {
    $inputData = [
        'ofullname' => mysqli_real_escape_string($db->conn, $_POST['owname']),
        'oemail' => mysqli_real_escape_string($db->conn, $_POST['owemail']),
        'ophone' => mysqli_real_escape_string($db->conn, $_POST['powphonehone']),
        'oaddress' => mysqli_real_escape_string($db->conn, $_POST['owaddress']),
        'ocompanyname' => mysqli_real_escape_string($db->conn, $_POST['owcomname']),
        'opassword' => mysqli_real_escape_string($db->conn, $_POST['owpassword']),
        'ocpassword' => mysqli_real_escape_string($db->conn, $_POST['owcpassword']),
        'oprofile' => $_FILES['owprofile']['name'],
        'ofile_temp_path' => $_FILES['owprofile']['tmp_name'], 
    ];

    $oadmins = new ownerregcontrol($db->conn);
    $oresults = $oadmins->create($inputData);

    if ($oresults) {
        header("Location: ownerlogin.php");
        exit(0);
    } else {
        header("Location: ownworngpass.php");
        exit(0);
    }
}




class ownerregcontrol {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($inputData) {
        $ofullname = $inputData['ofullname'];
        $oemail = $inputData['oemail'];
        $ophone = $inputData['ophone'];
        $oaddress = $inputData['oaddress'];
        $ocompanyname = $inputData['ocompanyname'];
        $opassword = $inputData['opassword'];
        $ocpassword = $inputData['ocpassword'];
        $oprofile = $inputData['oprofile'];
        $ofile_tmp_path = $inputData['ofile_temp_path'];

        $ostorage_path = "owner_profile/" . $oprofile;
        move_uploaded_file($ofile_tmp_path, $ostorage_path);

         if ($opassword == $ocpassword) {

        $oQuery = "INSERT INTO owner (name, email, phone_number, address, company_name, password, confirm_password, profile_photo) VALUES ('$ofullname','$oemail','$ophone','$oaddress','$ocompanyname','".md5($opassword)."','".md5($ocpassword)."','$ostorage_path')";
        $oadminregister = mysqli_query($this->conn, $oQuery);
        if ($oadminregister) {
            return true;
        } 

      }else{
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
  <title>Owner Registration</title>
  <link rel="stylesheet" type="text/css" href="pro1.css">
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
                      <a class="nav-link text-secondary text-center px-4" style="font-size: 17px;" id="b1" href="/rese/customer/customerdash.php"><b>D a s h b o a r d</b> </a>
                  </li> 
                    </ul>
                  
                    
          </div>
        </div>
      </nav>
  <!-- NAvigation Bar end -->


<div class="container " style="margin-top: 100px;">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="card shadow-lg bg-transparent">
              <div class="card-body ">
                <h1 class="card-header text-center display-4" style="font-family: 'Grand Hotel', cursive; color: orange;"><b>Owner Registration</b></h1>
                <form action="" method="post" enctype="multipart/form-data">
        
                  <div class="mb-3">
                    <label for="oname" class="form-label text-warning" style="font-size: 20px;"><b>Name :</b></label>
                    <input type="text" id="oname" name="owname" class="form-control" required>
                  </div>
                  <div class="mb-3"> 
                    <label for="oemail" class="form-label text-warning" style="font-size: 20px;"><b>Email ID :</b></label>
                    <input type="email" id="oemail" name="owemail" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label for="ophone" class="form-label text-warning" style="font-size: 20px;"><b>Phone Number :</b></label>
                    <input type="tel" id="ophone" name="powphonehone" class="form-control" required>
                  </div>
                   <div class="mb-3">
                    <label for="oaddress" class="form-label text-warning"style="font-size: 20px;"><b>Address :</b></label>
                    <input type="text" id="oaddress" name="owaddress" class="form-control" required>
                  </div>
                   <div class="mb-3">
                    <label for="coname" class="form-label text-warning"style="font-size: 20px;"><b>Company Name :</b></label>
                    <input type="text" id="coname" name="owcomname" class="form-control" required>
                  </div>
                   <div class="mb-3">
                    <label for="opassword" class="form-label text-warning"style="font-size: 20px;"><b>Password :</b></label>
                    <input type="password" id="opassword" name="owpassword" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label for="ocpassword" class="form-label text-warning"style="font-size: 20px;"><b>Conform Password :</b></label>
                    <input type="password" id="ocpassword" name="owcpassword" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label for="oprofile" class="form-label text-warning"style="font-size: 20px;"><b>Select Profile Photo:</b> </label>
                    <input type="file" class="form-control" id="oprofile" name="owprofile" accept="image/*" required>
                  </div>
                  <div class="d-grid">
                    <button type="submit" name="owsubmit" class="btn btn-outline-success"><b> Register</b></button>
                  </div>
                      
                  <div class="text-center mt-4">        
                    <h6 class="link text-light">Already have an account? <a href="ownerlogin.php" class="btn btn-outline-warning "><b>Login here</b> </a></h6>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>



      <?php

      //   if(isset($_SESSION['omessage']))
      //     {
      //        echo "<h5>".$_SESSION['omessage']."</h5>";
      //         unset($_SESSION['omessage']);
      //     }
      // ?>





</body>
</html>