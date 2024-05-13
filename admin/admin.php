<?php 
session_start();
  if(!isset($_SESSION['adminname'])){
  header('location:alogin.php');
}
?>



<?php

class selectalls {
    public $conn; 

    public function __construct()
    {
        $host = "localhost";
        $userName = "root";
        $password = "";
        $dbName = "busreservation";
        $this->conn = new mysqli($host, $userName, $password, $dbName);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function selectbuses() {
        $selbus = "SELECT * FROM buses";
        $sebus = mysqli_query($this->conn, $selbus);
        $num_of_rows1 = mysqli_num_rows($sebus);
        return $num_of_rows1;
    }

    public function selectcustomers() {
        $selcus = "SELECT * FROM customers";
        $secus = mysqli_query($this->conn, $selcus);
        $num_of_rows2 = mysqli_num_rows($secus);
        return $num_of_rows2;
    }

    public function selectbooking() {
        $selbook = "SELECT * FROM booking";
        $sebook = mysqli_query($this->conn, $selbook);
        $num_of_rows3 = mysqli_num_rows($sebook);
        return $num_of_rows3;
    }

    public function selectowner() {
        $selown = "SELECT * FROM owner";
        $seown = mysqli_query($this->conn, $selown);
        $num_of_rows4 = mysqli_num_rows($seown);
        return $num_of_rows4;
    }

    public function selectadmin() {
        $selad = "SELECT * FROM admin";
        $sead = mysqli_query($this->conn, $selad);
        $num_of_rows5 = mysqli_num_rows($sead);
        return $num_of_rows5;
    }
}

$selects = new selectalls();

$bussel = $selects->selectbuses();
$cussel = $selects->selectcustomers();
$booksel = $selects->selectbooking();
$ownsel = $selects->selectowner();
$adsel = $selects->selectadmin();



?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ADMIN</title>
  <script src="js.js"></script>
  <link rel="stylesheet" type="text/css" href="pro52.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Grand+Hotel&display=swap');
    .backg{
      background-image: url("img2.jpg");
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: 100% 100%;
    }
</style>
</head>
<body class="" style="background-color: lightgray;">
  <!-- 1 NAVIGATION START  -->
  
<!-- 1 NAVIGATION END  -->


<div class="container-fluid">
    <div class="row">
      <!-- CONTAINER 1 -->
      <div class="col-lg-3 col-sm-12 mb-2" style="height: ;">
        <div class="p-2 bg-white shadow me-1 my-2 mb-4 position-fixed " style="border-radius: 15px;">
             <div class="card" style="border: 0px;">
              <?php 

              ?>
             <a href="adminprofile.php" class="mx-auto"><img class="card-img-top rounded-circle" src="<?php echo  $_SESSION['apdmindp']  ?>" alt="Card image" style="width:128px; height: 128px;"></a> 
              <div class="card-body">
                <h4 class="card-title text-center">@admin</h4>
                <h6 class="text-center"><?php echo  $_SESSION['adminname'] ?></h6>
              </div>
            </div>

                  <div class="list-group" style="border: 0px;">
                    <a href="admin.php" class="list-group-item list-group-item-action list-group-item-success"> <i class="fa fa-tachometer me-4" aria-hidden="true" style="font-size: 25px;"></i><strong>Dashboard</strong> </a>
                    <a href="abus.php" class="list-group-item list-group-item-action list-group-item-success"><i class="fa fa-bus" aria-hidden="true" style="font-size: 25px;"></i><strong style="margin-left: 28px;">Buses and Owners</strong></a>
                    <a href="aroute.php" class="list-group-item list-group-item-action list-group-item-success"><i class="fa fa-road" aria-hidden="true" style="font-size: 25px;"></i><strong style="margin-left: 26px;">Route</strong></a>
                    <a href="acustomer.php" class="list-group-item list-group-item-action list-group-item-success"><i class="fa fa-user" aria-hidden="true" style="font-size: 25px;"></i><strong style="margin-left: 34px;">Customers</strong></a>
                    <a href="abooking.php" class="list-group-item list-group-item-action list-group-item-success"><i class="fa fa-book" aria-hidden="true" style="font-size: 25px;"></i><strong style="margin-left: 30px;">Bookings</strong></a>
                    <!-- <a href="aseat.php" class="list-group-item list-group-item-action list-group-item-success"><i class="fa fa-th" aria-hidden="true" style="font-size: 25px;"></i><strong style="margin-left: 30px;">Seats</strong></a> -->
                    <a href="adminreg.php" class="list-group-item list-group-item-action list-group-item-success"><i class="fa fa-male" aria-hidden="true" style="font-size: 25px;"></i><strong style="margin-left: 40px;">Add new Admin</strong></a>
                    <!-- <a href="updateadmin.php" class="list-group-item list-group-item-action list-group-item-success"><i class="fa fa-wrench" aria-hidden="true"></i><strong style="margin-left: 40px;">Update Admin Profile</strong></a> -->
                  </div>
                <div class="text-center mt-2">
                  <form action="updateadmin.php" method="post">
                    <input type="hidden" name="adminidd" value="<?php echo $_SESSION['adminid']; ?>">
                      <input href="updateadmin.php" class="btn btn-warning" type="submit" name="submit50" value="UPDATE PROFILE">
                  </form>
                </div>
              <div class="text-center mt-2">
                <a href="alogout.php"><button class="btn btn-success"><b>LOGOUT</b> </button> </a>
              </div>

        </div>
      </div>
      <!-- CONTAINER 1 -->



      <!-- CONTAINER 2 -->
      <div class="col-lg-9 col-sm-12 ">
        <div class="bg-white p-5 mt-4 mb-4 backg shadow-lg" style="border-radius: 15px;">
          
          <div class="row">
            <div class="col-lg-12 col-sm-12 bg-transprent ">
              <h1 style="font-family: 'Grand Hotel'; color: white;">Dashboard</h1>
            </div>
          </div>

          <div class="row justify-content-center">
            <div class="col-lg-3 col-sm-12 bg-transprent p-4 mx-4 mt-5">
              <div class="card">
                <a href="" class="btn btn-primary"><i class="fa fa-tachometer me-4" aria-hidden="true" style="font-size: 25px;"></i>Buses</a>
                  <div class="card-body">
                    <div class="d-flex">
                    <h6 class="card-title">Total Buses</h6>
                    <h4 class="float-end ms-5"><?php echo $bussel; ?></h4>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12 bg-transprent p-4 mx-4 mt-5">
              <div class="card">
                <a href="" class="btn btn-secondary"><i class="fa fa-road me-4" aria-hidden="true" style="font-size: 25px;"></i>Route</a>
                  <div class="card-body">
                    <div class="d-flex">
                    <h6 class="card-title">Total Routs</h6>
                    <h4 class="float-end ms-5"><?php echo $bussel; ?></h4>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12 bg-transprent p-4 mx-4 mt-5">
              <div class="card">
                <a href="" class="btn btn-danger"><i class="fa fa-user me-4" aria-hidden="true" style="font-size: 25px;"></i>Costomers</a>
                  <div class="card-body">
                    <div class="d-flex">
                    <h6 class="card-title">Total Customers</h6>
                    <h4 class="float-end ms-5"><?php echo $cussel; ?></h4>
                    </div>
                  </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-12 bg-transprent p-4 mx-4 mt-5">
              <div class="card">
                <a href="" class="btn btn-warning"><i class="fa fa-book me-4" aria-hidden="true" style="font-size: 25px;"></i>Bookings</a>
                  <div class="card-body">
                    <div class="d-flex">
                    <h6 class="card-title">Total Bookings</h6>
                    <h4 class="float-end ms-5"><?php echo $booksel; ?></h4>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12 bg-transprent p-4 mx-4 mt-5">
              <div class="card">
                <a href="" class="btn btn-dark"><i class="fa fa-th me-4" aria-hidden="true" style="font-size: 25px;"></i>Owners</a>
                  <div class="card-body">
                    <div class="d-flex">
                    <h6 class="card-title">Total Owners</h6>
                    <h4 class="float-end ms-5"><?php echo $ownsel; ?></h4>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12 bg-transprent p-4 mx-4 mt-5">
              <div class="card">
                <a href="" class="btn btn-success"><i class="fa fa-male me-2" aria-hidden="true" style="font-size: 25px;"></i>Total Admins</a>
                  <div class="card-body">
                    <div class="d-flex">
                    <h6 class="card-title">Total Admins</h6>
                    <h4 class="float-end ms-5"><?php echo $adsel; ?></h4>
                    </div>
                  </div>
                </div>
            </div>

          </div>

      </div>
    </div>
      <!-- CONTAINER 2 -->

    </div>
  </div>
</body>
</html>