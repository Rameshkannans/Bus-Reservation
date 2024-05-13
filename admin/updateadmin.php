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

    public function aselectad($adminid){
       $aselad = "SELECT * FROM admin WHERE id = '$adminid'";
        $asead = mysqli_query($this->conn, $aselad);
        $upad = mysqli_fetch_assoc($asead); 
        return $upad;
    }

    public function aupdatead($anam, $aemai, $aphon, $aaddress, $acompan, $apasswor, $acpas)
    {
      $aadm =  $_SESSION['adminid'];
        $sqls = "UPDATE admin SET name='$anam', email='$aemai', phone_number='$aphon', address='$aaddress', 
                                  company_id='$acompan', password='".md5($apasswor)."', confirm_password='".md5($acpas)."' 
                                  WHERE id='$aadm'";

        $aa = mysqli_query($this->conn, $sqls);
        if ($aa) {
            header('Location: alogin.php');
        } else {
            return false;
        }
    }

}

if (isset($_POST['submit51'])) {
    if (isset($_FILES['adpphoto']) && is_uploaded_file($_FILES['adpphoto']['tmp_name'])) {
        $file_name = $_FILES['adpphoto']['name'];
        $file_tmp_path = $_FILES['adpphoto']['tmp_name'];
        $storage_path = "../admin/admin_profile/" . $file_name; 

        
        move_uploaded_file($file_tmp_path, $storage_path);
         $aadminid = $_SESSION['adminid'];
    
        $sqlssq = "UPDATE admin SET profile_photo = '$storage_path' WHERE id = '$aadminid' ";

        if (mysqli_query($conn, $sqlssq)) {
            // header('Location: alogin.php');
             // echo "Profile photo updated successfully.";
        } else {
            echo "Error updating profile photo: " . mysqli_error($conn);
        }
    } else {
        echo "No file uploaded.";
    }
   

}


$updatebusowner = new ubusowners($conn);
if (isset($_POST['submit50'])) {
  $_SESSION['adminid'] = $_POST['adminidd'];
 $adminid = $_POST['adminidd'];
 $upad = $updatebusowner->aselectad($adminid);
}


if (isset($_POST['submit51'])) {
  $anam = $_POST['anam'];
  $aemai = $_POST['aemai'];
  $aphon = $_POST['aphon'];
  $aaddress = $_POST['aaddress'];
  $acompan = $_POST['acompan'];
  $apasswor = $_POST['apasswor'];
  $acpas = $_POST['acpas'];
    $aupdateResults = $updatebusowner->aupdatead($anam, $aemai, $aphon, $aaddress, $acompan, $apasswor, $acpas);
}




?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Registration Update</title>
  <link rel="stylesheet" type="text/css" href="pro1.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body {
  background-image: url('img2.jpg');
  background-size: cover; 
  background-attachment: fixed; 
  background-repeat: no-repeat;
}
  </style>
</head>
<body>

<div class="container mt-5 ">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="card shadow-lg bg-transparent">
              <div class="card-body ">
                <h1 class="card-header text-center text-dark" ><b>UPDATE ADMIN PROFILE</b></h1>
                <form action="" method="post" enctype="multipart/form-data">
        

              <div class="row">
                  <div class="col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label for="name" class="form-label text-secondary"><b>Name :</b></label>
                      <input type="text" id="name" name="anam" class="form-control" value="<?php echo $upad['name']; ?>" required>
                    </div>
                  </div>

                  <div class="col-lg-6 col-sm-12">
                    <div class="mb-3"> 
                      <label for="email" class="form-label text-secondary"><b>Email ID :</b></label>
                      <input type="email" id="email" name="aemai" class="form-control" value="<?php echo $upad['email']; ?>" required>
                    </div>
                  </div>
              </div>


              <div class="row">
                  <div class="col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label for="te" class="form-label text-secondary"><b>Phone Number :</b></label>
                      <input type="tel" id="te" name="aphon" class="form-control" value="<?php echo $upad['phone_number']; ?>" required>
                    </div>
                  </div>

                  <div class="col-lg-6 col-sm-12">
                     <div class="mb-3">
                      <label for="pas" class="form-label text-secondary"><b>Address :</b></label>
                      <input type="text" id="pas" name="aaddress" class="form-control" value="<?php echo $upad['address']; ?>" required>
                    </div>
                   </div>
              </div>


              <div class="row">
                   <div class="col-lg-6 col-sm-12"> 
                     <div class="mb-3">
                      <label for="pas" class="form-label text-secondary"><b>Company ID :</b></label>
                      <input type="text" id="pas" name="acompan" class="form-control" value="<?php echo $upad['company_id']; ?>" required>
                    </div>
                  </div>

                  <div class="col-lg-6 col-sm-12">
                     <div class="mb-3">
                      <label for="pas" class="form-label text-secondary"><b>Password :</b></label>
                      <input type="password" id="pas" name="apasswor" class="form-control" required>
                    </div>
                  </div>
              </div>


              <div class="row">
                  <div class="col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label for="cp" class="form-label text-secondary"><b>Conform Password :</b></label>
                      <input type="password" id="cp" name="acpas" class="form-control" required>
                    </div>
                  </div>

                  <div class="col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label for="dp" class="form-label text-secondary"><b>Select Profile Photo:</b> </label>
                      <input type="file" class="form-control" id="dp" name="adpphoto" accept="image/*" value="<?php echo $upad['profile_photo']; ?>" required>
                    </div>
                  </div>
              </div>


                  <div class="d-grid">
                    <button type="submit" name="submit51" class="btn btn-outline-success"><b> UPDATE</b></button>
                  </div>

                  <div class="text-center mt-4">        
                          <h6 class="link ">Go to Admin Dashboard<a href="admin.php" class="btn btn-outline-warning ms-2"><b>GO</b> </a></h6>
                        </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

</body>
</html>