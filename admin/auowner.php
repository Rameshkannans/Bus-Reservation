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

class auoupdatecontrol
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function aselectowner($aownidd)
    {
        $aselown = "SELECT * FROM owner WHERE id = '$aownidd'";
        $aseown = mysqli_query($this->conn, $aselown);
        $upown = mysqli_fetch_assoc($aseown);
        return $upown;
    }

    public function auoupdate($uoname, $uoemail, $uophone, $uoaddress, $uocname, $uopassword, $uocpassword)
    {
        $aownidds = $_SESSION['aownidds'];
        $sql = "UPDATE owner 
                SET name = '$uoname', 
                    email = '$uoemail', 
                    phone_number = '$uophone', 
                    address = '$uoaddress', 
                    company_name = '$uocname', 
                    password = '" . md5($uopassword) . "', 
                    confirm_password = '" . md5($uocpassword) . "'
                WHERE id = '$aownidds'";

        $uo = mysqli_query($this->conn, $sql);
        if ($uo) {
             header('Location: abus.php');
            exit();
        } else {
            return false;
        }
    }
}

if (isset($_POST['submit24'])) {



  if (isset($_POST['submit24'])) {
    $uoname = $_POST['auoname'];
    $uoemail = $_POST['auoemail'];
    $uophone = $_POST['auophone'];
    $uoaddress = $_POST['auoaddress'];
    $uocname = $_POST['auocname'];
    $uopassword = $_POST['auopassword'];
    $uocpassword = $_POST['auocpassword'];
    $aupdateowner = new auoupdatecontrol($conn);
    $aupdateResult = $aupdateowner->auoupdate($uoname, $uoemail, $uophone, $uoaddress, $uocname, $uopassword, $uocpassword);
}


  
    $aowniddss = $_SESSION['aownidds'];
    if (isset($_FILES['aprofile_photo']) && is_uploaded_file($_FILES['aprofile_photo']['tmp_name'])) {
        $file_name = $_FILES['aprofile_photo']['name'];
        $file_tmp_path = $_FILES['aprofile_photo']['tmp_name'];
        $storage_path = "../buso/owner_profile/" . $file_name;

        move_uploaded_file($file_tmp_path, $storage_path);

        $sql = "UPDATE owner SET profile_photo = '$storage_path' WHERE id = '$aowniddss'";

        if (mysqli_query($conn, $sql)) {
             header('Location: abus.php');
            exit();
        } else {
            echo "Error updating profile photo: " . mysqli_error($conn);
        }
    } else {
        echo "No file uploaded.";
    }
}

$aupdateowner = new auoupdatecontrol($conn);

if (isset($_POST['submit23'])) {
    $_SESSION['aownidds'] = $_POST['aownidd'];
    $aownidd = $_POST['aownidd'];
    $upown = $aupdateowner->aselectowner($aownidd);
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
          <div class="col-lg-12">
            <div class="card shadow-lg bg-transparent">
              <div class="card-body ">
                <h1 class="card-header text-center text-dark" ><b>UPDATE OWNER PROFILE</b></h1>
                <form action="" method="post" enctype="multipart/form-data">
        

              <div class="row">
                  <div class="col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label for="n" class="form-label text-secondary"><b>Name :</b></label>
                      <input type="text" id="n" name="auoname" class="form-control"  value="<?php echo $upown['name'] ?>">
                    </div>
                  </div>

                  <div class="col-lg-6 col-sm-12">
                    <div class="mb-3"> 
                      <label for="e" class="form-label text-secondary"><b>Email ID :</b></label>
                      <input type="e" id="email" name="auoemail" class="form-control"  value="<?php echo $upown['email'] ?>">
                    </div>
                  </div>
              </div>


              <div class="row">
                  <div class="col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label for="t" class="form-label text-secondary"><b>Phone Number :</b></label>
                      <input type="tel" id="t" name="auophone" class="form-control"  value="<?php echo $upown['phone_number'] ?>">
                    </div>
                  </div>

                  <div class="col-lg-6 col-sm-12">
                     <div class="mb-3">
                      <label for="uadd" class="form-label text-secondary"><b>Address :</b></label>
                      <input type="text" id="uadd" name="auoaddress" class="form-control"  value="<?php echo $upown['address'] ?>">
                    </div>
                   </div>
              </div>


              <div class="row">
                   <div class="col-lg-6 col-sm-12"> 
                     <div class="mb-3">
                      <label for="ucname" class="form-label text-secondary"><b>Company Name :</b></label>
                      <input type="text" id="ucname" name="uocname" class="form-control"  value="<?php echo $upown['company_name'] ?>">
                    </div>
                  </div>

                  <div class="col-lg-6 col-sm-12">
                     <div class="mb-3">
                      <label for="upass" class="form-label text-secondary"><b>Password :</b></label>
                      <input type="password" id="upass" name="auopassword" class="form-control"  >
                    </div>
                  </div>
              </div>


              <div class="row">
                  <div class="col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label for="ucpass" class="form-label text-secondary"><b>Conform Password :</b></label>
                      <input type="password" id="ucpass" name="auocpassword" class="form-control">
                    </div>
                  </div>

                  <div class="col-lg-6 col-sm-12">
                    <div class="mb-3">
                        <label for="uodp" class="form-label text-secondary"><b>Select Profile Photo:</b></label>
                        <input type="file" class="form-control" id="auodp" name="aprofile_photo" accept="image/*" required>
                    </div>
                </div>


                  <div class="d-grid text-center">
                  <button type="submit" name="submit24" class="btn btn-outline-success"><b> UPDATE</b></button> 
                  </div>

                   <div class="text-center mt-4">        
                          <h6 class="link ">Go to Admin Bus and Owner<a href="abus.php" class="btn btn-outline-warning ms-2"><b>GO</b> </a></h6>
                        </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>



</body>
</html>