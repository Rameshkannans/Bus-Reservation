<?php session_start(); ?>


<?php

class admibdelete {
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

    public function adel($delad) {
        $delsql = "DELETE FROM admin WHERE id ='$delad'";
        $aada = $this->conn->query($delsql);
        if ($aada) {
          header('Location:alogin.php');  
        }
    }
  }
  $addel = new admibdelete();

if (isset($_POST['submit60'])) {
  $delad = $_POST['admindel'];
  $addel->adel($delad);
}




?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ADMIN PROFILE</title>
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
        <div class="p-2 bg-white shadow me-1 my-2 mb-4 position-fixed" style="border-radius: 15px;">
             <div class="card" style="border: 0px;">
              <img class="card-img-top rounded-circle mx-auto" src="<?php echo  $_SESSION['apdmindp']  ?>" alt="Card image" style="width:130px; ">
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
                    <!-- \ -->
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
        <div class="bg-white p-5 mt-4 mb-4 backg " style="border-radius: 15px; height: 580px;">
          
          <div class="row">
            <div class="col-lg-12 col-sm-12 bg-transparent ">
              <h1 style="font-family: 'Grand Hotel'; color: gray;">Admin Profiles</h1>
            </div>


            <div class="col-lg-12 col-sm-12 bg-transparent ">
              
              <div class="row">
                <div class="col-lg-3 bg-transparent p-2 text-center">
                  <a  class="mx-auto"><img class="card-img-top rounded-circle" src="<?php echo  $_SESSION['apdmindp']  ?>" alt="Card image" style="width:160px; height: 160px;"></a>
                  <h3 class="text-center text-light"><?php echo  $_SESSION['adminname'] ?></h3>
                </div>
                <div class="col-lg-9 bg-transparent p-2">
                  
                  <div class="card shadow-lg bg-transparent">
                      <div class="card-body">

                    
                      <div class="d-flex ">
                        <div class="d-flex" style="margin-right: 140px;">
                          <h5 class="me-1 text-seconday">NAME: </h5>
                          <h6 class="ms-5 mt-1 text-light"><?php echo  $_SESSION['adminname'] ?></h6>
                        </div>
                        <div class="d-flex">
                          <h5 class="me-1 text-seconday">EMAIL: </h5>
                          <h6 class="ms-5 mt-1 text-light"><?php echo  $_SESSION['adminemail'] ?></h6>
                        </div>
                      </div>
                  


                      <div class="d-flex mt-5">
                        <div class="d-flex" style="margin-right:100px;">
                          <h5 class="me-1 text-seconday">PHONE: </h5>
                          <h6 class="ms-5 mt-1 text-light"><?php echo  $_SESSION['adminphone'] ?></h6>
                        </div>
                        <div class="d-flex">
                          <h5 class="me-1 text-seconday">ADDRESS: </h5>
                          <h6 class="ms-5 mt-1 text-light"><?php echo  $_SESSION['adminaddress'] ?></h6>
                        </div>
                      </div>

                      
                        <div class="d-flex mt-5">
                          <h5 class="me-1 text-seconday">COMPANY ID: </h5>
                          <h6 class="ms-5 mt-1 text-light"><?php echo  $_SESSION['admincompanyid'] ?></h6>
                        </div>


                        <div class="mt-4">
                        

                           <form method="post" action="">
                          <input type="hidden" name="admindel" value="<?php echo $_SESSION['adminid']; ?>">
                          <div class="text-center">
                              <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal">
                                  REMOVE
                              </button></td>
                              <div class="modal fade" id="myModal">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h4 class="modal-title text-primary">@admin <?php echo  $_SESSION['adminname'] ?>......</h4>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                          </div>
                                          <div class="modal-body text-center">
                                              <h5 class="text-danger">Do you want to remove the customer bookings?....</h5>
                                                 <button type="submit" name="submit60" class="btn btn-danger">REMOVE PROFILE</button>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </form>


                        </div>
                      </div>
                    </div>


                </div>
              </div>
            </div>



          </div>
          </div>
      </div>
    </div>
      <!-- CONTAINER 2 -->

    </div>
</body>
</html>