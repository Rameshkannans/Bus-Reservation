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

    public function aselectbus($abusid){
       $aselbus = "SELECT * FROM buses WHERE busid = '$abusid'";
        $asebus = mysqli_query($this->conn, $aselbus);
        $upbus = mysqli_fetch_assoc($asebus); 
        return $upbus;
    }


    public function aubupdate($busnum, $busname, $busmodal, $busac, $buslic, $busins, $bussleep)
    {
      $abusids =  $_SESSION['abusids'];
        $sqls = "UPDATE buses SET bus_number='$busnum', bus_name='$busname', bus_model='$busmodal', ac='$buslic', 
                                  license='$buslic', insurance='$busins', sleeper='$bussleep' 
                                  WHERE busid='$abusids'";

        $ub = mysqli_query($this->conn, $sqls);
        if ($ub) {
            header('Location: abus.php');
        } else {
            return false;
        }
    }
}

if (isset($_POST['submit12'])) {
    if (isset($_FILES['dpps']) && is_uploaded_file($_FILES['dpps']['tmp_name'])) {
        $file_name = $_FILES['dpps']['name'];
        $file_tmp_path = $_FILES['dpps']['tmp_name'];
        $storage_path = "../buso/bus_profile/" . $file_name; 

        
        move_uploaded_file($file_tmp_path, $storage_path);
         $abusidss =  $_SESSION['abusids'];
    
        $sqlssq = "UPDATE buses SET bus_photo = '$storage_path' WHERE busid = '$abusidss' ";

        if (mysqli_query($conn, $sqlssq)) {
            header('Location: abus.php');
             // echo "Profile photo updated successfully.";
        } else {
            echo "Error updating profile photo: " . mysqli_error($conn);
        }
    } else {
        echo "No file uploaded.";
    }
  
}






$updatebusowner = new ubusowners($conn);

if (isset($_POST['submit18'])) {
  $_SESSION['abusids'] = $_POST['abusid'];
 $abusid = $_POST['abusid'];
 $upbus = $updatebusowner->aselectbus($abusid);
}


if (isset($_POST['submit21'])) {
  $busnum = $_POST['busnum'];
  $busname = $_POST['busname'];
  $busmodal = $_POST['busmodal'];
  $busac = $_POST['busac'];
  $buslic = $_POST['buslic'];
  $busins = $_POST['busins'];
  $bussleep = $_POST['bussleep'];

    $aupdateResults = $updatebusowner->aubupdate($busnum, $busname, $busmodal, $busac, $buslic, $busins, $bussleep);
}


?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Bus Update</title>
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
          <div class="col-lg-12 col-sm-12">
            <div class="card shadow-lg bg-transparent">
              <div class="card-body ">
                <h1 class="card-header text-center text-dark" ><b>ADMIN BUS UPDATE</b></h1>
                <form action="" method="post" enctype="multipart/form-data">
        
              <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label for="bnum" class="form-label text-secondary"><b>Bus Number :</b></label>
                      <input type="text" id="bnum" name="busnum" class="form-control" required value="<?php echo $upbus['bus_number']; ?>">
                    </div>
                  </div>
                <div class="col-lg-6 col-sm-12">
                  <div class="mb-3"> 
                    <label for="bnam" class="form-label text-secondary"><b>Bus Name :</b></label>
                    <input type="text" id="bnam" name="busname" class="form-control" required value="<?php echo $upbus['bus_name']; ?>">
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label for="bmod" class="form-label text-secondary"><b>Bus Modal :</b></label>
                    <input type="text" id="bmod" name="busmodal" class="form-control" required value="<?php echo $upbus['bus_model']; ?>">
                  </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                   <div class="mb-3">
                    <label for="pas" class="form-label text-secondary"><b>AC (or) NON-AC :</b></label>
                    <select class="form-select " id="pas" name="busac"> 
                        <option>AC</option>
                        <option>NON-AC</option>
                      </select>
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-lg-6 col-sm-12">
                   <div class="mb-3">
                    <label for="li" class="form-label text-secondary"><b>Licence :</b></label>
                   <select class="form-select " id="li" name="buslic">
                        <option>YES</option>
                        <option>NO</option>
                      </select>
                  </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                   <div class="mb-3">
                    <label for="in" class="form-label text-secondary"><b>Insurence :</b></label>
                    <select class="form-select " id="in" name="busins">
                        <option>YES</option>
                        <option>NO</option>
                      </select>
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label for="se" class="form-label text-secondary"><b>Sleeper (or) Seatter :</b></label>
                    <select class="form-select " id="se" name="bussleep">
                        <option>Sleep</option>
                        <option>Seat</option>
                      </select>
                  </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label for="dp" class="form-label text-secondary"><b>Select Bus Photo:</b> </label>
                    <input type="file" class="form-control" id="dp" name="dpps" accept="image/*" required value="<?php $upbus['bus_photo']; ?>" required>
                  </div>
                </div>
              </div>






                  <div class="d-grid">
                    <button type="submit" name="submit21" class="btn btn-outline-success"><b> UPDATE</b></button>
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