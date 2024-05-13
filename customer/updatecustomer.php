
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



class ucupdatecontrol
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function uoupdate($cnames, $emails, $phones, $addressss, $citys, $states, $pincodes, $dobs, $passss, $cpassss)
    {
      $idid = $_SESSION['ccid'];
        $sql = "UPDATE customers SET name='$cnames', email='$emails', phone_number='$phones', address='$addressss', 
                                      city='$citys', state='$states', pincode='$pincodes', date_of_birth=' $dobs',
                                      password='".md5($passss)."', confirm_password='".md5($cpassss)."' WHERE id = '$idid'";

        $uc = mysqli_query($this->conn, $sql);
        if ($uc) {
            header('Location:customerlogout.php');
        } else {
            return false;
        }
    }
}

if (isset($_POST['submit16'])) {
    $ididi = $_SESSION['ccid'];
    if (isset($_FILES['pps']) && is_uploaded_file($_FILES['pps']['tmp_name'])) {
        $file_name = $_FILES['pps']['name'];
        $file_tmp_path = $_FILES['pps']['tmp_name'];
        $storage_path = "customer_profile/" . $file_name; 

        
        move_uploaded_file($file_tmp_path, $storage_path);

    
        $sql5 = "UPDATE customers SET profile_photo = '$storage_path' WHERE id = '$ididi'";

        if (mysqli_query($conn, $sql5)) {
                header('Location:customerlogout.php');
             // echo "Profile photo updated successfully.";
        } else {
            echo "Error updating profile photo: " . mysqli_error($conn);
        }
    } else {
        echo "No file uploaded.";
    }
}





if (isset($_POST['submit16'])) {
  $cnames = $_POST['names'];
  $emails = $_POST['emails'];
  $phones = $_POST['phones'];
  $addressss = $_POST['addressss'];
  $citys = $_POST['citys'];
  $states = $_POST['states'];
  $pincodes = $_POST['pincodes'];
  $dobs = $_POST['dobs'];
  // $pps = $_POST['pps'];
  $passss = $_POST['passss'];
  $cpassss = $_POST['cpassss'];
  

    $updatecustomer = new ucupdatecontrol($conn);
    $updateResult2 = $updatecustomer->uoupdate($cnames, $emails, $phones, $addressss, $citys, $states, $pincodes, $dobs, $passss, $cpassss);
  
}









if (isset($_POST['submit15'])) {
  $ccid = $_POST['ccid'];
  $ccdp = $_POST['ccdp'];
  $ccna = $_POST['ccna'];
  $ccem = $_POST['ccem'];
  $ccph = $_POST['ccph'];
  $ccadd = $_POST['ccadd'];
  $cccc = $_POST['cccc'];
  $ccst = $_POST['ccst'];
  $ccpi = $_POST['ccpi'];
  $ccdob = $_POST['ccdob'];
  // $ccpass = $_POST['ccpass'];
  // $ccccpass = $_POST['ccccpass'];

$_SESSION['ccid'] = $ccid;
$_SESSION['ccdp'] = $ccdp;
$_SESSION['ccna'] = $ccna;
$_SESSION['ccem'] = $ccem;
$_SESSION['ccph'] = $ccph;
$_SESSION['ccadd'] = $ccadd;
$_SESSION['cccc'] = $cccc;
$_SESSION['ccst'] = $ccst;
$_SESSION['ccpi'] = $ccpi;
$_SESSION['ccdob'] = $ccdob;
// $_SESSION['ccpass'] = $ccpass;
// $_SESSION['ccccpass'] = $ccccpass;

}



?>





<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Customer Update</title>
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
      background-color: red; 
    }
  </style>
</head>
<body>

  <!-- NAvigation Bar end -->
    <nav class="navbar navbar-expand-sm bg-white navbar-dark px-1" style="position: fixed; top: 0; width: 100%; z-index: 1000; opacity: 0.8;">
        <div class="container-fluid">
            <ul class="navbar-nav ">
              <li class="nav-item">
                <a class="nav-link text-dark" style="font-size: 17px ;font-family: 'Grand Hotel', cursive;" id="b1" href="#"><h4><b class="text-warning">Travel</b> </h4></a>
              </li></ul> 
              <button class="navbar-toggler bg-warning" type="button" data-bs-toggle="collapse" data-bs-target="#rks">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="rks">
                  <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                      <a class="nav-link text-dark text-center px-4" style="font-size: 17px;" id="b1" href="cusbooking.php">HOME</a>
                  </li> 
                    </ul>
                    
          </div>
        </div>
      </nav>
  <!-- NAvigation Bar end -->


<div class="container-fluid" style="margin-top: 100px;">
  <div class="row justify-content-center">

      <div class="col-lg-6 col-sm-12 bg-transparent ms-4 me-5  p-2">
        <div class="card p-2 shadow-lg bg-transparent">
          <h1 class="card-header text-center text-light " style="font-size: 60px; font-family: 'Grand Hotel', cursive;"><b>Update Customer Deatails</b></h1>
          <form action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12 pt-2">
              <div class="mb-3">
                <label for="name" class="form-label text-warning"><b>Name :</b></label>
                <input type="text" id="name" name="names" class="form-control" value="<?php echo $_SESSION['ccna'] ?>" required>
              </div>
            </div>
              <!-- <div class="col-sm-12 pt-2">
              <div class="mb-3">
                <label for="name" class="form-label text-info"><b>Last Name :</b></label>
                <input type="text" id="name" name="nam" class="form-control" required>
              </div>
            </div> -->
            <div class="col-sm-12 pt-2">
              <div class="mb-3">
                <label for="email" class="form-label text-warning"><b>Email :</b></label>
                <input type="email" id="email" name="emails" class="form-control" value="<?php echo $_SESSION['ccem'] ?>" required>
              </div>
            </div>
            <div class="col-sm-12 pt-2">
              <div class="mb-3">
                <label for="ph" class="form-label text-warning"><b>Phone :</b></label>
                <input type="tel" id="ph" name="phones" class="form-control"  value="<?php echo $_SESSION['ccph'] ?>" required>
              </div>
            </div>
            <div class="col-sm-12 pt-2">
              <div class="mb-3">
                <label for="add" class="form-label text-warning"><b>Address :</b></label>
                <input type="text" id="add" name="addressss" class="form-control"  value="<?php echo $_SESSION['ccadd'] ?>" required>
              </div>
            </div>
            <div class="col-sm-12 pt-2">
              <div class="mb-3">
                <label for="ci" class="form-label text-warning"><b>City :</b></label>
                <input type="text" id="ci" name="citys" class="form-control"  value="<?php echo $_SESSION['cccc'] ?>" required>
              </div>
            </div>
            <div class="col-sm-12 pt-2">
              <div class="mb-3">
                <label for="st" class="form-label text-warning"><b>State :</b></label>
                <input type="text" id="st" name="states" class="form-control"  value="<?php echo $_SESSION['ccst'] ?>" required>
              </div>
            </div>
            <div class="col-sm-12 pt-2">
              <div class="mb-3">
                <label for="pi" class="form-label text-warning"><b>Pincode :</b></label>
                <input type="number" id="pi" name="pincodes" class="form-control"  value="<?php echo $_SESSION['ccpi'] ?>" required>
              </div>
            </div>
            <div class="col-sm-12 pt-2">
              <div class="mb-3">
                <label for="da" class="form-label text-warning"><b>Date Of Birth :</b></label>
                <input type="date" id="da" name="dobs" class="form-control"  value="<?php echo $_SESSION['ccdob'] ?>" required>
              </div>
            </div>
            <div class="col-sm-12 pt-2">
              <div class="mb-3">
                <label for="pp" class="form-label text-warning"><b>Profile Photo :</b></label>
                <input type="file" id="pp" name="pps" class="form-control" accept="image/*" required>
              </div>
            </div>
            <div class="col-sm-12 pt-2">
              <div class="mb-3">
                <label for="pa" class="form-label text-warning"><b>Password :</b></label>
                <input type="password" id="pa" name="passss" class="form-control" required >
              </div>
            </div>
            <div class="col-sm-12 pt-2">
              <div class="mb-3">
                <label for="cpa" class="form-label text-warning"><b>Retype Password :</b></label>
                <input type="password" id="cpa" name="cpassss" class="form-control"  required>
              </div>
            </div>

            <div class="d-grid">
              <button type="submit" name="submit16" class="btn btn-outline-success"><b> UPDATE PROFILE</b></button>
            </div>
                      
            <div class="text-center mt-4">        
              <h6 class="link text-light">GO to Profile <a href="cusprofile.php" class="btn btn-outline-warning "><b>GO</b> </a></h6>
            </div>

          </div>
        </form>
        </div>
      </div>
     

      
</body>
</html>