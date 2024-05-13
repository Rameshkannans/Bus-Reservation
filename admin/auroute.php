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

    public function aaselectbus($aabusid){
       $aaselbus = "SELECT * FROM buses WHERE busid = '$aabusid'";
        $aasebus = mysqli_query($this->conn, $aaselbus);
        $aupbus = mysqli_fetch_assoc($aasebus); 
        return $aupbus;
    }


    public function aubupdate($busnum, $busname, $busrf, $busrt, $bushl, $busdate)
    {
      $abusids1 =  $_SESSION['aabusid'];
        $sqls = "UPDATE buses SET bus_number='$busnum', bus_name='$busname', route_from='$busrf',
                                  route_to='$busrt', start_time='$busrt', how_long='$bushl', tdate='$busdate' 
                                  WHERE busid='$abusids1'";

        $ub = mysqli_query($this->conn, $sqls);
        if ($ub) {
            header('Location: aroute.php');
        } else {
            return false;
        }
    }
}


$aupdatebusowner = new ubusowners($conn);

if (isset($_POST['submit25'])) {
  $_SESSION['aabusid'] = $_POST['aabusid'];
 $aabusid = $_POST['aabusid'];
 $aaupbus = $aupdatebusowner->aaselectbus($aabusid);
}


if (isset($_POST['submit27'])) {
  $busnum = $_POST['busnum'];
  $busname = $_POST['busname'];
  $busrf = $_POST['busrf'];
  $busrt = $_POST['busrt'];
  $bushl = $_POST['bushl'];
  $busdate = $_POST['busdate'];

    $aupdateResults = $aupdatebusowner->aubupdate($busnum, $busname, $busrf, $busrt, $bushl, $busdate);
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Route Update</title>
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
                      <input type="text" id="bnum" name="busnum" class="form-control" required value="<?php echo $aaupbus['bus_number']; ?>">
                    </div>
                  </div>
                <div class="col-lg-6 col-sm-12">
                  <div class="mb-3"> 
                    <label for="bnam" class="form-label text-secondary"><b>Bus Name :</b></label>
                    <input type="text" id="bnam" name="busname" class="form-control" required value="<?php echo $aaupbus['bus_name']; ?>">
                  </div>
                </div>
              </div>



                <div class="row">
                <div class="col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label for="brf" class="form-label text-secondary"><b>Route From :</b></label>
                      <input type="text" id="brf" name="busrf" class="form-control" required value="<?php echo $aaupbus['route_from']; ?>">
                  </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label for="brt" class="form-label text-secondary"><b>Route To :</b></label>
                    <input type="text" id="brt" name="busrt" class="form-control" required value="<?php echo $aaupbus['route_to']; ?>"> 
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label for="te" class="form-label text-secondary"><b>Start Timing :</b></label>
                    <input type="time" class="form-control" id="inputTime" name="busrt"  required value="<?php echo $aaupbus['start_time']; ?>">
                  </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label for="bhl" class="form-label text-secondary"><b>How Long Time(hour) :</b></label>
                    <input type="number" class="form-control" id="bhl" name="bushl" required value="<?php echo $aaupbus['how_long']; ?>">
                  </div>
                </div>
              </div>
              <div class="col-lg-12 col-sm-12">
                  <div class="mb-3">
                    <label for="bd" class="form-label text-secondary"><b>Date :</b></label>
                    <input type="date" class="form-control" id="bd" name="busdate" required value="<?php echo $aaupbus['tdate']; ?>">
                  </div>
                </div>
              </div>

                  <div class="d-grid">
                    <button type="submit" name="submit27" class="btn btn-outline-success"><b> UPDATE</b></button>
                  </div>
                        

                        <div class="text-center mt-4">        
                          <h6 class="link ">Go to Admin Route<a href="aroute.php" class="btn btn-outline-warning ms-2"><b>GO</b> </a></h6>
                        </div>
                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>



</body>
</html>