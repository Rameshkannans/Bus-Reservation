
<?php
 session_start();
include('db.php');
$db = new Database($servername, $username, $password, $dbname);

if(isset($_POST['adreg'])) {
    $inputData = [
        'fullname' => mysqli_real_escape_string($db->conn, $_POST['adname']),
        'email' => mysqli_real_escape_string($db->conn, $_POST['ademail']),
        'phone' => mysqli_real_escape_string($db->conn, $_POST['adphone']),
        'address' => mysqli_real_escape_string($db->conn, $_POST['adaddress']),
        'companyid' => mysqli_real_escape_string($db->conn, $_POST['adcompany']),
        'password' => mysqli_real_escape_string($db->conn, $_POST['adpassword']),
        'cpassword' => mysqli_real_escape_string($db->conn, $_POST['adcpassword']),
        'profile' => $_FILES['addp']['name'],
        'file_temp_path' => $_FILES['addp']['tmp_name'], 
    ];

    $admins = new adminregcontrol($db->conn);
    $results = $admins->create($inputData);

    if ($results) {
        header("Location: alogin.php");
        exit(0);
    } else {
        header("Location: aworngpass.php");
        exit(0);
    }
}




class adminregcontrol {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($inputData) {
        $fullname = $inputData['fullname'];
        $email = $inputData['email'];
        $phone = $inputData['phone'];
        $address = $inputData['address'];
        $companyid = $inputData['companyid'];
        $password = $inputData['password'];
        $cpassword = $inputData['cpassword'];
        $profile = $inputData['profile'];
        $file_tmp_path = $inputData['file_temp_path'];

        $storage_path = "admin_profile/" . $profile;
        move_uploaded_file($file_tmp_path, $storage_path);


        if ($password == $cpassword) {
      
        $Query = "INSERT INTO admin (name, email, phone_number, address, company_id, password, confirm_password, profile_photo) VALUES ('$fullname','$email','$phone','$address','$companyid','".md5($password)."','".md5($cpassword)."','$storage_path')";
        $adminregister = mysqli_query($this->conn, $Query);
        if ($adminregister) {
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
  <title>Admin Registration</title>
  <link rel="stylesheet" type="text/css" href="">
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


<div class="container mt-5 ">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="card shadow-lg bg-transparent">
              <div class="card-body ">
                <h1 class="card-header text-center text-dark" ><b>ADMIN REGISTRATION</b></h1>
                <form action="" method="post" enctype="multipart/form-data">
        
                  <div class="mb-3">
                    <label for="aname" class="form-label text-secondary"><b>Full Name :</b></label>
                    <input type="text" id="aname" name="adname" class="form-control" required>
                  </div>
                  <div class="mb-3"> 
                    <label for="aemail" class="form-label text-secondary"><b>Email ID :</b></label>
                    <input type="email" id="aemail" name="ademail" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label for="aphone" class="form-label text-secondary"><b>Phone Number :</b></label>
                    <input type="tel" id="aphone" name="adphone" class="form-control" required>
                  </div>
                   <div class="mb-3">
                    <label for="aaddress" class="form-label text-secondary"><b>Address :</b></label>
                    <input type="text" id="address" name="adaddress" class="form-control" required>
                  </div>
                   <div class="mb-3">
                    <label for="acom" class="form-label text-secondary"><b>Company ID :</b></label>
                    <input type="text" id="acom" name="adcompany" class="form-control" required>
                  </div>
                   <div class="mb-3">
                    <label for="apass" class="form-label text-secondary"><b>Password :</b></label>
                    <input type="password" id="apass" name="adpassword" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label for="acpass" class="form-label text-secondary"><b>Conform Password :</b></label>
                    <input type="password" id="acpass" name="adcpassword" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label for="adp" class="form-label text-secondary"><b>Select Profile Photo:</b> </label>
                    <input type="file" class="form-control" id="adp" name="addp" accept="image/*" required>
                  </div>
                  <div class="d-grid">
                    <button type="submit" name="adreg" class="btn btn-outline-success"><b> Register</b></button>
                  </div>
                  
                  <div class="text-center mt-4">        
                    <h6 class="link">Already have an account? <a href="alogin.php" class="btn btn-outline-warning "><b>Login here</b> </a></h6>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>



      <?php
      //   if(isset($_SESSION['message']))
      //     {
      //        echo "<h5>".$_SESSION['message']."</h5>";
      //         unset($_SESSION['message']);
      //     }
      ?>





</body>
</html>