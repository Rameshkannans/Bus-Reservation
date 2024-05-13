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



class uoupdatecontrol
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function uoupdate($uoname, $uoemail, $uophone, $uoaddress, $uocname, $uopassword, $uocpassword, $storage_path, $wereemail)
    {
        $sql = "UPDATE owner 
                SET name = '$uoname', 
                    email = '$uoemail', 
                    phone_number = '$uophone', 
                    address = '$uoaddress', 
                    company_name = '$uocname', 
                    password = '".md5($uopassword)."', 
                    confirm_password = '".md5($uocpassword)."', 
                    profile_photo = '$storage_path' 
                    WHERE email = '$wereemail'";

        $uo = mysqli_query($this->conn, $sql);
        if ($uo) {
            return true;
            header('Location:busdeatailsdash.php');
        } else {
            return false;
        }
    }
}

if (isset($_POST['uosubmit'])) {
    $user_id = $_SESSION['owneremail']; 

    if (isset($_FILES['profile_photo']) && is_uploaded_file($_FILES['profile_photo']['tmp_name'])) {
        $file_name = $_FILES['profile_photo']['name'];
        $file_tmp_path = $_FILES['profile_photo']['tmp_name'];
        $storage_path = "owner_profile/" . $file_name; 

        
        move_uploaded_file($file_tmp_path, $storage_path);

    
        $sql = "UPDATE owner SET profile_photo = '$storage_path' WHERE email = '$user_id'";

        if (mysqli_query($conn, $sql)) {
               header('Location:busdeatailsdash.php');
             // echo "Profile photo updated successfully.";
        } else {
            echo "Error updating profile photo: " . mysqli_error($conn);
        }
    } else {
        echo "No file uploaded.";
    }
}


if (isset($_POST['uosubmit'])) {
    $uoname = $_POST['uoname'];
    $uoemail = $_POST['uoemail'];
    $uophone = $_POST['uophone'];
    $uoaddress = $_POST['uoaddress'];
    $uocname = $_POST['uocname'];
    $uopassword = $_POST['uopassword'];
    $uocpassword = $_POST['uocpassword'];
    $wereemail = $_SESSION['owneremail'];

    $updateowner = new uoupdatecontrol($conn);
    $updateResult = $updateowner->uoupdate($uoname, $uoemail, $uophone, $uoaddress, $uocname, $uopassword, $uocpassword, $storage_path, $wereemail);
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Owner Registration Update</title>
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
  </style>
</head>
<body>

<div class="container mt-5 ">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="card shadow-lg bg-transparent">
              <div class="card-body ">
                <h1 class="card-header text-center display-4" style="font-family: 'Grand Hotel', cursive; color: orange;"><b>Update Owner Profile</b></h1>
                <form action="" method="post" enctype="multipart/form-data">
        

              <div class="row">
                  <div class="col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label for="n" class="form-label text-warning"><b>Name :</b></label>
                      <input type="text" id="n" name="uoname" class="form-control"  value="<?php echo $_SESSION['ownername'] ?>">
                    </div>
                  </div>

                  <div class="col-lg-6 col-sm-12">
                    <div class="mb-3"> 
                      <label for="e" class="form-label text-warning"><b>Email ID :</b></label>
                      <input type="e" id="email" name="uoemail" class="form-control"  value="<?php echo $_SESSION['owneremail'] ?>">
                    </div>
                  </div>
              </div>


              <div class="row">
                  <div class="col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label for="t" class="form-label text-warning"><b>Phone Number :</b></label>
                      <input type="tel" id="t" name="uophone" class="form-control"  value="<?php echo $_SESSION['ownerphone'] ?>">
                    </div>
                  </div>

                  <div class="col-lg-6 col-sm-12">
                     <div class="mb-3">
                      <label for="uadd" class="form-label text-warning"><b>Address :</b></label>
                      <input type="text" id="uadd" name="uoaddress" class="form-control"  value="<?php echo $_SESSION['owneraddress'] ?>">
                    </div>
                   </div>
              </div>


              <div class="row">
                   <div class="col-lg-6 col-sm-12"> 
                     <div class="mb-3">
                      <label for="ucname" class="form-label text-warning"><b>Company Name :</b></label>
                      <input type="text" id="ucname" name="uocname" class="form-control"  value="<?php echo $_SESSION['ownercompanyname'] ?>">
                    </div>
                  </div>

                  <div class="col-lg-6 col-sm-12">
                     <div class="mb-3">
                      <label for="upass" class="form-label text-warning"><b>Password :</b></label>
                      <input type="password" id="upass" name="uopassword" class="form-control"  >
                    </div>
                  </div>
              </div>


              <div class="row">
                  <div class="col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label for="ucpass" class="form-label text-warning"><b>Conform Password :</b></label>
                      <input type="password" id="ucpass" name="uocpassword" class="form-control"  >
                    </div>
                  </div>

                  <div class="col-lg-6 col-sm-12">
                    <div class="mb-3">
                        <label for="uodp" class="form-label text-warning"><b>Select Profile Photo:</b></label>
                        <input type="file" class="form-control" id="uodp" name="profile_photo" accept="image/*" required>
                    </div>
                </div>





                  <div class="text-center d-grid">
                  <button type="submit" name="uosubmit" class="btn btn-outline-success"><b> UPDATE</b></button> 
                  </div>

                  < <div class="text-center mt-4">        
                          <h6 class="link text-light">Go to Dashboard<a href="busdeatailsdash.php" class="btn btn-outline-warning ms-2"><b>GO</b> </a></h6>
                        </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>



</body>
</html>