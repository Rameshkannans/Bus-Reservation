  <?php session_start(); ?>

  <?php
  class OwnControl {
      public $conn;
      public $seleresult = [];
      public $fetch_owne = null; // Initialize the property

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

      public function selectot($selowta){
          $seleown = "SELECT * FROM owner WHERE id='$selowta' ";
          $owne = mysqli_query($this->conn, $seleown);
          $num_of_rows = mysqli_num_rows($owne);
          if ($num_of_rows == 1) {
              $this->fetch_owne = $owne->fetch_assoc();
              return $this->fetch_owne;
          }
      }
      
      public function fine($cus_id1, $cusdp, $cusemail, $cusname, $busid, $bnum, $bna, $bc, $bsleep, $bfrom, $bto, $bst,  $bda, $seats, $quantity, $totcost, $email, $name, $phone_number){
          $finins = "INSERT INTO booking (cusid, cprofile, cemail, cname, bid, busnumber, busname, bac, bsleeper, broute_from, broute_to, bstart_time, btdate, bookingseats, seatquantity, totaamount, oemail, oname, onumber)
              VALUES ('$cus_id1', '$cusdp', '$cusemail', '$cusname', '$busid', '$bnum', '$bna', '$bc', '$bsleep', '$bfrom', '$bto', '$bst', '$bda', '$seats', '$quantity', '$totcost', '$email', '$name', '$phone_number')";

          $finalbook = mysqli_query($this->conn, $finins);
          if ($finalbook) {
            header('Location: cusbooking.php');
          } else {
              return false;
          }
      }

  }

  $selowta = $_SESSION['oid'];
  $object = new OwnControl();
  $selectowner = $object->selectot($selowta);

  if (isset($_POST['consubmit'])) {
      $cusdp = $_POST['cusdp'];
      $cusemail = $_POST['cusemail'];
      $cusname = $_POST['cusname'];
      $bna = $_POST['bna'];
      $bc = $_POST['bc'];
      $bsleep = $_POST['bsleep'];
      $bfrom = $_POST['bfrom'];
      $bto = $_POST['bto'];
      $bst = $_POST['bst'];
      $bnum = $_POST['bnum'];
      $bda = $_POST['bda'];
      $busid = $_POST['busid'];
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone_number = $_POST['phone_number'];
      $seats = $_POST['seats'];
      $quantity = $_POST['quantity'];
      $totcost = $_POST['totcost'];
      $cus_id1 = $_POST['cus_id1'];

      if (!empty($cus_id1)) {
          $final = $object->fine($cus_id1, $cusdp, $cusemail, $cusname, $busid, $bnum, $bna, $bc, $bsleep, $bfrom, $bto, $bst,  $bda, $seats, $quantity, $totcost, $email, $name, $phone_number);
      } else {
          echo "Error: cus_id1 is empty or invalid.";
      }
  }

  ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>conform Booking Selection</title>
  <link rel="stylesheet" type="text/css" href="">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Grand+Hotel&display=swap');
    #b1:hover {
            background-color: red; 
        }
         body {
        background-image: url('img6.jpg');
        background-size: cover; 
        background-attachment: fixed; 
        background-repeat: no-repeat;
      }
</style>


  <!-- NAvigation Bar end -->
    <nav class="navbar navbar-expand-sm bg-white navbar-dark px-1" style="position: fixed; top: 0; width: 100%; z-index: 1000; opacity: 0.8;">
        <div class="container-fluid">
            <ul class="navbar-nav ">
              <li class="nav-item">
                <a class="nav-link text-dark text-center px-4" style="font-size: 17px;"><h4 style="font-family: 'Grand Hotel', cursive;" class="text-warning">Travel</h4></a>
              </li></ul> 
              <button class="navbar-toggler bg-warning" type="button" data-bs-toggle="collapse" data-bs-target="#rks">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="rks">
                  
                    <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                      
                    </ul>
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link text-dark text-center px-4" style="font-size: 17px;" id="b1" href="cusbooking.php">HOME</a>
                      </li> 
                    </ul>
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link text-dark text-center px-4" style="font-size: 17px;" id="b1" href="custicket.php">Show my Tickets</a>
                      </li> 
                    </ul>
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link text-dark text-center px-4" style="font-size: 17px;" id="b1" href="customerlogout.php">Logout</a>
                      </li> 
                    </ul>
          </div>
        </div>
      </nav>
  <!-- NAvigation Bar end -->

          <nav class="navbar navbar-expand-sm bg-transparent navbar-dark shadow " style="margin-top: 60px;">
          <div class="container-fluid">
            <a class="navbar-brand" href="cusprofile.php"><img class="card-img-top rounded-circle" src="<?php echo $_SESSION['cusdp']  ?>" alt="Card image" style="width:100px; height: 100px;"> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
              <ul class="navbar-nav">
                <li class="nav-item" style="margin-left: 200px;">
                  <div class="d-flex">
                  <h5 class="text-warning">Name: </h5>
                  <h6 class="text-light mt-1 ms-2"><?php echo  $_SESSION['cusname']; ?></h6>
                  </div>
                </li>
                <li class="nav-item" style="margin-left: 200px;">
                  <div class="d-flex">
                  <h5 class="text-warning">Email: </h5>
                  <h6 class="text-light mt-1 ms-2"><?php echo  $_SESSION['cusemail']; ?></h6>
                  </div>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>  -->   
              </ul>
            </div>
          </div>
        </nav>



<div class="container-fluid mt-5">
  <div class="row justify-content-center">
    <div class="col-lg-12 col-sm-12 bg-transparent p-5">
      <div class="card shadow bg-transparent">
        <div class="card-body">
              <div>
                <div class="d-flex">
                  <div class="d-flex mx-auto">
                    <h5 class="text-info  me-4" style="margin-top: 40px;">CUSTOMER PROFILE : </h5>
                    <h6><img class="rounded-circle" style="width: 100px; height: 100px;" src="<?php echo $_SESSION['cusdp']  ?>" > </h6>
                  </div>
                  <div class="d-flex mx-auto">
                    <h5 class="text-info" style="margin-top: 40px;">CUSTOMER ID : </h5>
                    <h6 class="text-light  ms-3" style="margin-top: 40px;"><?php echo  $_SESSION['cusemail']; ?></h6>
                  </div>
                  <div class="d-flex mx-auto ">
                    <h5 class="text-info" style="margin-top: 40px;">CUSTOMER NAME : </h5>
                    <h6 class="text-light ms-3" style="margin-top: 40px;"><?php echo  $_SESSION['cusname']; ?></h6>
                  </div>
                </div>

                <hr>

                  <div class="d-flex">
                  <div class="d-flex mx-auto">
                    <h5 class="text-info">BUS NAME : </h5>
                    <h6 class="text-light mt-1 ms-3"><?php echo $_SESSION['bna']; ?> </h6>
                  </div>
                  <div class="d-flex mx-auto">
                    <h5 class="text-info">AC/NON-AC : </h5>
                    <h6 class="text-light mt-1 ms-3"><?php echo $_SESSION['bc']; ?></h6>
                  </div>
                  <div class="d-flex mx-auto">
                    <h5 class="text-info">SLEEPER/SITTER : </h5>
                    <h6 class="text-light mt-1 ms-3"><?php echo $_SESSION['bsleep']; ?></h6>
                  </div>
                </div>

                <div class="d-flex mt-5">
                  <div class="d-flex mx-auto">
                    <h5 class="text-info">FROM : </h5>
                    <h6 class="text-light mt-1 ms-3"><?php echo $_SESSION['bfrom']; ?></h6>
                  </div>
                  <div class="d-flex mx-auto">
                    <h5 class="text-info">TO : </h5>
                    <h6 class="text-light mt-1 ms-3"><?php echo $_SESSION['bto']; ?></h6>
                  </div>
                  <div class="d-flex mx-auto">
                    <h5 class="text-info">START TIME : </h5>
                    <h6 class="text-light mt-1 ms-3"><?php echo $_SESSION['bst']; ?></h6>
                  </div>
                </div>

                <div class="d-flex mt-5">
                <div class="d-flex mx-auto">
                    <h5 class="text-info">BUS NUMBER : </h5>
                    <h6 class="text-light mt-1 ms-3"><?php echo $_SESSION['bnum']; ?></h6>
                  </div>
                  <div class="d-flex mx-auto">
                    <h5 class="text-info">BOOKING DATE : </h5>
                    <h6 class="text-light mt-1 ms-3"><?php echo $_SESSION['bda']; ?></h6>
                  </div>
                  <div class="d-flex mx-auto">
                    <h5 class="text-info">BUS OWNER ID: </h5>
                    <h6 class="text-light mt-1 ms-3"><?php echo $selectowner['id']; ?></h6>
                  </div>
                </div>
                <hr>

               <div class="d-flex mt-4">
                <div class="d-flex mx-auto">
                    <h5 class="text-info">BUS OWNER NAME : </h5>
                    <h6 class="text-light mt-1 ms-3"><?php echo $selectowner['name']; ?></h6>
                </div>
                <div class="d-flex mx-auto">
                    <h5 class="text-info">BUS OWNER EMAIL : </h5>
                    <h6 class="text-light mt-1 ms-3"><?php echo $selectowner['email']; ?></h6>
                </div>
                <div class="d-flex mx-auto">
                    <h5 class="text-info">PHONE NUMBER : </h5>
                    <h6 class="text-light mt-1 ms-3"><?php echo $selectowner['phone_number']; ?></h6>
                </div>



                <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        if (isset($_POST['bookedSeats'])) {
                            $_SESSION['bookedSeats'] = $_POST['bookedSeats'];
                            $_SESSION['seatQuantity'] = $_POST['seatQuantity'];
                            $_SESSION['totalCost'] = $_POST['totalCost'];
                           echo "success";
                        } else {
                           
                           echo "nothing"; 
                        }
                    }
                    ?>

                
            </div>
            <hr>
            <div class="d-flex mt-4">
                <div class="d-flex mx-auto">
                    <h5 class="text-info">BOOKED SEATS : </h5>
                    <h6 class="text-light mt-1 ms-3"><?php echo $_SESSION['bookedSeats']; ?></h6>
                </div>
                <div class="d-flex mx-auto">
                    <h5 class="text-info">SEAT QUANTITY: </h5>
                    <h6 class="text-light mt-1 ms-3"><?php echo $_SESSION['seatQuantity']; ?></h6>
                </div>
                <div class="d-flex mx-auto">
                    <h5 class="text-info">TOTAL AMOUNT : </h5>
                    <h6 class="text-light mt-1 ms-3">Rs: <?php echo $_SESSION['totalCost']; ?></h6>
                </div>
            </div>
            <hr>



            <form method="post" action="">
              <input type="hidden" name="cusdp" value="<?php echo $_SESSION['cusdp']; ?> ">
              <input type="hidden" name="cusemail" value="<?php echo $_SESSION['cusemail']; ?> ">
              <input type="hidden" name="cusname" value="<?php echo $_SESSION['cusname']; ?> ">
              <input type="hidden" name="bna" value="<?php echo $_SESSION['bna']; ?> ">
              <input type="hidden" name="bc" value="<?php echo $_SESSION['bc']; ?> ">
              <input type="hidden" name="bsleep" value="<?php echo $_SESSION['bsleep']; ?> ">
              <input type="hidden" name="bfrom" value="<?php echo $_SESSION['bfrom']; ?> ">
              <input type="hidden" name="bto" value="<?php echo $_SESSION['bto']; ?> ">
              <input type="hidden" name="bst" value="<?php echo $_SESSION['bst']; ?> ">
              <input type="hidden" name="bnum" value="<?php echo  $_SESSION['bnum']; ?> ">
              <input type="hidden" name="bda" value="<?php echo $_SESSION['bda']; ?> ">
              <input type="hidden" name="busid" value="<?php echo $selectowner['id']; ?> ">
              <input type="hidden" name="name" value="<?php echo $selectowner['name']; ?> ">
              <input type="hidden" name="email" value="<?php echo $selectowner['email']; ?> ">
              <input type="hidden" name="phone_number" value="<?php echo $selectowner['phone_number'];?> ">
              <input type="hidden" name="seats" value="<?php echo $_SESSION['bookedSeats']; ?> ">
              <input type="hidden" name="quantity" value="<?php echo $_SESSION['seatQuantity']; ?> ">
              <input type="hidden" name="totcost" value="<?php echo $_SESSION['totalCost'];; ?> ">
              <input type="hidden" name="cus_id1" value="<?php echo $_SESSION['cusid']; ?> ">
            <div class="text-center">
            <button type="submit" name="consubmit" class="btn btn-outline-success">ONFIRM BOOKING</button> 
            </div>
             </form>
              
        </div>
      </div>
    </div>





</head>
</html>