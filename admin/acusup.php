<?php
session_start();
$host = "localhost";
$userName = "root";
$password = "";
$dbName = "busreservation";
$conn = new mysqli($host, $userName, $password, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



class ubusowners
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function aselectbus($acustid){
       $aselcus = "SELECT * FROM customers WHERE id = '$acustid'";
        $asebus = mysqli_query($this->conn, $aselcus);
        $upcus = mysqli_fetch_assoc($asebus); 
        return $upcus;
    }


    public function acucupdate($cusname, $cusmail, $cusphone, $cusaddress, $cuscity, $cusstate, $cusspin, $cusdob, $cuspassword, $cuscpassword )
    {
      $acustid =  $_SESSION['acustid'];
        $sqlss = "UPDATE customers SET name='$cusname', email='$cusmail', phone_number='$cusphone', address='$cusaddress', 
                                  city='$cuscity', state='$cusstate', pincode='$cusspin' ,date_of_birth='$cusdob',
                                   password='".md5($cuspassword)."', confirm_password='".md5($cuscpassword)."'
                                  WHERE id ='$acustid'";

        $uc = mysqli_query($this->conn, $sqlss);
        if ($uc) {
            header('Location: acustomer.php');
        } else {
            return false;
        }
    }
}

if (isset($_POST['cussubmit'])) {
    if (isset($_FILES['cusddp']) && is_uploaded_file($_FILES['cusddp']['tmp_name'])) {
        $file_name = $_FILES['cusddp']['name'];
        $file_tmp_path = $_FILES['cusddp']['tmp_name'];
        $storage_path = "../customer/customer_profile/" . $file_name; 

        
        move_uploaded_file($file_tmp_path, $storage_path);
         $acustidd =  $_SESSION['acustid'];
    
        $sqlssq = "UPDATE customers SET profile_photo = '$storage_path' WHERE id = '$acustidd' ";

        if (mysqli_query($conn, $sqlssq)) {
            header('Location: acustomer.php');
             // echo "Profile photo updated successfully.";
        } else {
            echo "Error updating profile photo: " . mysqli_error($conn);
        }
    } else {
        echo "No file uploaded.";
    }
   

}






$updatecustomers = new ubusowners($conn);

if (isset($_POST['submit35'])) {
  $_SESSION['acustid'] = $_POST['acustid'];
 $acustid = $_POST['acustid'];
 $upcus =$updatecustomers->aselectbus($acustid);
}

if (isset($_POST['cussubmit'])) {
  $cusname = $_POST['cusname'];
  $cusmail = $_POST['cusmail'];
  $cusphone = $_POST['cusphone'];
  $cusaddress = $_POST['cusaddress'];
  $cuscity = $_POST['cuscity'];
  $cusstate = $_POST['cusstate'];
  $cusspin = $_POST['cusspin'];
  $cusdob = $_POST['cusdob'];
  $cusddp = $_POST['cusddp'];
  $cuspassword = $_POST['cuspassword'];
  $cuscpassword = $_POST['cuscpassword'];

    $aupdateResults = $updatecustomers->acucupdate($cusname, $cusmail, $cusphone, $cusaddress, $cuscity, $cusstate, $cusspin, $cusdob, $cuspassword, $cuscpassword );
}


?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Customer Update</title>
  <link rel="stylesheet" type="text/css" href="pro1.css">
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
 #b1:hover {
      background-color: red; 
    }
  </style>
</head>
<body>

  <!-- NAvigation Bar end -->
    <nav class="navbar navbar-expand-sm bg-white navbar-dark px-1" style="position: fixed; top: 0; width: 100%; z-index: 1000;">
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
                      <a class="nav-link text-dark text-center px-4" style="font-size: 17px;" id="b1" href="customerdash.php">D a s h b o a r d</a>
                  </li> 
                    </ul>
                    
          </div>
        </div>
      </nav>
  <!-- NAvigation Bar end -->


<div class="container" style="margin-top: 100px;">
  <div class="row">
      <div class="col-lg-12 col-sm-12 bg-transparent ms-4 me-5  p-2">
        <div class="card p-2 shadow-lg bg-transparent">
          <h3 class="card-header text-center text-dark" ><b>CUSTOMER REGISTRATION</b></h3>
          <form action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12 pt-2">
              <div class="mb-3">
                <label for="cname" class="form-label text-secondary"><b>Name :</b></label>
                <input type="text" id="cname" name="cusname" class="form-control" value="<?php echo $upcus['name'] ?>" required>
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
                <label for="cmail" class="form-label text-secondary"><b>Email :</b></label>
                <input type="email" id="cmail" name="cusmail" class="form-control" value="<?php echo $upcus['email'] ?>" required>
              </div>
            </div>
            <div class="col-sm-6 pt-2">
              <div class="mb-3">
                <label for="cph" class="form-label text-secondary"><b>Phone :</b></label>
                <input type="tel" id="cph" name="cusphone" class="form-control" value="<?php echo $upcus['phone_number'] ?>" required>
              </div>
            </div>
            <div class="col-sm-12 pt-2">
              <div class="mb-3">
                <label for="cadd" class="form-label text-secondary"><b>Address :</b></label>
                <input type="text" id="cadd" name="cusaddress" class="form-control" value="<?php echo $upcus['address'] ?>" required>
              </div>
            </div>
            <div class="col-sm-12 pt-2">
              <div class="mb-3">
                <label for="ccity" class="form-label text-secondary"><b>City :</b></label>
                <input type="text" id="ccity" name="cuscity" class="form-control" value="<?php echo $upcus['city'] ?>" required>
              </div>
            </div>
            <div class="col-sm-12 pt-2">
              <div class="mb-3">
                <label for="cst" class="form-label text-secondary"><b>State :</b></label>
                <input type="text" id="cst" name="cusstate" class="form-control" value="<?php echo $upcus['state'] ?>" required>
              </div>
            </div>
            <div class="col-sm-6 pt-2">
              <div class="mb-3">
                <label for="cpin" class="form-label text-secondary"><b>Pincode :</b></label>
                <input type="number" id="cpin" name="cusspin" class="form-control" value="<?php echo $upcus['pincode'] ?>" required>
              </div>
            </div>
            <div class="col-sm-6 pt-2">
              <div class="mb-3">
                <label for="cd" class="form-label text-secondary"><b>Date Of Birth :</b></label>
                <input type="date" id="cd" name="cusdob" class="form-control" value="<?php echo $upcus['date_of_birth'] ?>" required>
              </div>
            </div>
            <div class="col-sm-12 pt-2">
              <div class="mb-3">
                <label for="cdp" class="form-label text-secondary"><b>Profile Photo :</b></label>
                <input type="file" id="cdp" name="cusddp" class="form-control" value="<?php echo $upcus['profile_photo'] ?>" accept="image/*" required>
              </div>
            </div>
            <div class="col-sm-6 pt-2">
              <div class="mb-3">
                <label for="cpass" class="form-label text-secondary"><b>Password :</b></label>
                <input type="password" id="cpass" name="cuspassword" class="form-control" required>
              </div>
            </div>
            <div class="col-sm-6 pt-2">
              <div class="mb-3">
                <label for="ccpass" class="form-label text-secondary"><b>Retype Password :</b></label>
                <input type="password" id="ccpass" name="cuscpassword" class="form-control" required>
              </div>
            </div>

            <div class="d-grid">
              <button type="submit" name="cussubmit" class="btn btn-outline-success"><b> UPDATE</b></button>
            </div>
                      
            <div class="text-center mt-4">        
              <h6 class="link">Go to Admin Customer<a href="acustomer.php" class="btn btn-outline-warning "><b>GO</b> </a></h6>
            </div>

          </div>
        </form>
        </div>
      </div>
     

 

  </div>
</div>
</body>
</html>