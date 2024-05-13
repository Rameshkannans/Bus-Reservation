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



class ubupdatecontrol
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function ubupdate($busnum, $busname, $busmodal, $busac, $buslic, $busins, $bussleep, $busrf, $busrt,$busst, $bushl, $busdate)
    {
      $biiid = $_SESSION['biid'];
        $sqls = "UPDATE buses SET bus_number='$busnum', bus_name='$busname', bus_model='$busmodal', ac='$buslic', 
                                  license='$buslic', insurance='$busins', sleeper='$bussleep', route_from='$busrf',
                                  route_to='$busrt', start_time='$busst', how_long='$bushl', tdate='$busdate' 
                                  WHERE busid='$biiid'";

        $ub = mysqli_query($this->conn, $sqls);
        if ($ub) {
            header('Location: busdeatails.php');
        } else {
            return false;
        }
    }
}

if (isset($_POST['submit12'])) {
    if (isset($_FILES['dpps']) && is_uploaded_file($_FILES['dpps']['tmp_name'])) {
        $file_name = $_FILES['dpps']['name'];
        $file_tmp_path = $_FILES['dpps']['tmp_name'];
        $storage_path = "bus_profile/" . $file_name; 

        
        move_uploaded_file($file_tmp_path, $storage_path);
          $biiiid = $_SESSION['biid'];
    
        $sqlss = "UPDATE buses SET bus_photo = '$storage_path' WHERE busid = '$biiiid' ";

        if (mysqli_query($conn, $sqlss)) {
            header('Location: busdeatails.php');
             // echo "Profile photo updated successfully.";
        } else {
            echo "Error updating profile photo: " . mysqli_error($conn);
        }
    } else {
        echo "No file uploaded.";
    }
}




if (isset($_POST['submit12'])) {
  $busnum = $_POST['busnum'];
  $busname = $_POST['busname'];
  $busmodal = $_POST['busmodal'];
  $busac = $_POST['busac'];
  $buslic = $_POST['buslic'];
  $busins = $_POST['busins'];
  $bussleep = $_POST['bussleep'];
  $busrf = $_POST['busrf'];
  $busrt = $_POST['busrt'];
  $busst = $_POST['busst'];
  $bushl = $_POST['bushl'];
  $busdate = $_POST['busdate'];

  $updatebuses = new ubupdatecontrol($conn);
    $updateResults = $updatebuses->ubupdate($busnum, $busname, $busmodal, $busac, $buslic, $busins, $bussleep, $busrf, $busrt, $busst, $bushl, $busdate);
}




if (isset($_POST['submit11'])) {
  $biid = $_POST['biid'];
  $bnum = $_POST['bnum'];
  $bnam = $_POST['bnam'];
  $bmod = $_POST['bmod'];
  $baac = $_POST['baac'];
  $blic = $_POST['blic'];
  $bins = $_POST['bins'];
  $bslee = $_POST['bslee'];
  $brf = $_POST['brf'];
  $brt = $_POST['brt'];
  $bstime = $_POST['bstime'];
  $bhl = $_POST['bhl'];
  $bpp = $_POST['bpp'];
  $bdate = $_POST['bdate'];

    $_SESSION['biid'] =  $biid;
    $_SESSION['bnum'] =  $bnum;
    $_SESSION['bnam'] =  $bnam;
    $_SESSION['bmod'] =  $bmod;
    $_SESSION['baac'] =  $baac;
    $_SESSION['blic'] =  $blic;
    $_SESSION['bins'] =  $bins;
    $_SESSION['bslee'] =  $bslee;
    $_SESSION['brf'] =  $brf;
    $_SESSION['brt'] =  $brt;
    $_SESSION['bstime'] =  $bstime;
    $_SESSION['bhl'] =  $bhl;
    $_SESSION['bpp'] =  $bpp;
    $_SESSION['bdate'] =  $bdate;
}

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bus Registration Update</title>
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
                <h1 class="card-header display-4 text-center" style="font-family: 'Grand Hotel', cursive; color: orange;"><b>Bus Registration Update</b></h1>
                <form action="" method="post" enctype="multipart/form-data">
        
              <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label for="bnum" class="form-label text-warning"><b>Bus Number :</b></label>
                      <input type="text" id="bnum" name="busnum" class="form-control" required value="<?php echo $_SESSION['bnum'] ?>">
                    </div>
                  </div>
                <div class="col-lg-6 col-sm-12">
                  <div class="mb-3"> 
                    <label for="bnam" class="form-label text-warning"><b>Bus Name :</b></label>
                    <input type="text" id="bnam" name="busname" class="form-control" required value="<?php echo $_SESSION['bnam'] ?>">
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label for="bmod" class="form-label text-warning"><b>Bus Modal :</b></label>
                    <input type="text" id="bmod" name="busmodal" class="form-control" required value="<?php echo $_SESSION['bmod'] ?>">
                  </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                   <div class="mb-3">
                    <label for="pas" class="form-label text-warning"><b>AC (or) NON-AC :</b></label>
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
                    <label for="li" class="form-label text-warning"><b>Licence :</b></label>
                   <select class="form-select " id="li" name="buslic">
                        <option>YES</option>
                        <option>NO</option>
                      </select>
                  </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                   <div class="mb-3">
                    <label for="in" class="form-label text-warning"><b>Insurence :</b></label>
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
                    <label for="se" class="form-label text-warning"><b>Sleeper (or) Seatter :</b></label>
                    <select class="form-select " id="se" name="bussleep">
                        <option>Sleep</option>
                        <option>Seat</option>
                      </select>
                  </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label for="dp" class="form-label text-warning"><b>Select Bus Photo:</b> </label>
                    <input type="file" class="form-control" id="dp" name="dpps" accept="image/*" required value="<?php echo $_SESSION['bpp']; ?>" required>
                  </div>
                </div>
              </div>





                <div class="row">
                <div class="col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label for="brf" class="form-label text-warning"><b>Route From :</b></label>
          <input type="text" id="brf" name="busrf" class="form-control" required value="<?php echo $_SESSION['brf'] ?>">
                  </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label for="brt" class="form-label text-warning"><b>Route To :</b></label>
                    <input type="text" id="brt" name="busrt" class="form-control" required value="<?php echo $_SESSION['brt'] ?>"> 
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label for="te" class="form-label text-warning"><b>Start Timing :</b></label>
                    <input type="time" class="form-control" id="inputTime" name="busst"  required value="<?php echo $_SESSION['bstime'] ?>">
                  </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label for="bhl" class="form-label text-warning"><b>How Long Time(hours) :</b></label>
                    <input type="number" class="form-control" id="bhl" name="bushl" required value="<?php echo $_SESSION['bhl'] ?>">
                  </div>
                </div>
              </div>
              <div class="col-lg-12 col-sm-12">
                  <div class="mb-3">
                    <label for="bd" class="form-label text-warning"><b>Date :</b></label>
                    <input type="date" class="form-control" id="bd" name="busdate" required value="<?php echo $_SESSION['bdate'] ?>">
                  </div>
                </div>
              </div>


                  <div class="d-grid">
                    <button type="submit" name="submit12" class="btn btn-outline-success"><b> UPDATE</b></button>
                  </div>
                        

                        <div class="text-center mt-4">        
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