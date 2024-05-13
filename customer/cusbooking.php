<?php 
  session_start();
  if(!isset($_SESSION['cusemail'])){
  header('location:cuslogin.php');
}
?>
<?php

class searcontrol {
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

    public function searchta($from, $to, $dates) {
        $search = "SELECT * FROM buses WHERE route_from LIKE '%$from%'
         OR route_to LIKE '%$to%' 
         OR tdate LIKE '%$dates%'";
        $resu = $this->conn->query($search);
        
        return $resu;
    }
}

?>





<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Booking</title>
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
        #img{
          background-image: url('g5.jpg');
          height: 600px;
          background-size: cover;border-radius: 40px;

        }
        /*@media (min-width: 992px) {
        #img {
          position: static;
          top: auto;
          left: auto;
          transform: none;
        }*/
  </style>
</head>
<body>

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
                    <!-- <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link text-dark text-center px-4" style="font-size: 17px;" id="b1" href="#"><i class="fa fa-location-arrow me-2" aria-hidden="true"></i>LIVE LOCATION</a>
                      </li> 
                    </ul> -->
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



<div class="container-fluid">
  <div class="row justify-content-center mt-5">
    <div class="col-lg-10 col-sm-12 bg-white mb-5 p-2" id="img">
      
        <div class="row justify-content-center">
          <div class="col-lg-6 bg-transparent p-2" style="margin-left: 500px;">

             <div class="card shadow-lg bg-transparent">
            <div class="row">
              <div class="col-lg-12 p-5 bg-transparent">
                <form action="" method="post">
                  <div class="d-flex">
                      <div class="mb-3 me-5 text-center">
                        <label for="1" class="form-label text-info"><b>FROM</b> </label>
                          <input type="text" class="form-control" id="1" name="from" required>
                      </div>
                    <div class="mb-3 text-center">
                        <label for="2" class="form-label text-info"><b>TO</b> </label>
                        <input type="text" class="form-control" id="2" name="to" required>
                    </div>
                  </div>
                    <div class="mb-3 text-center">
                      <label for="3" class="form-label text-info"><b>DATE</b> </label>
                      <input type="date" class="form-control" id="3" name="dates" required>
                    </div>
                    <div class="d-grid" >
                    <button type="submit" name="searchbus" class="btn btn-outline-success"><a href='#down' style="text-decoration: none;"><b class="text-light">SEARCH BUS</b></a></button>
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





<div class="container mb-5" id="down">
  <h2 class="text-center display-4 text-light" style="font-family: 'Grand Hotel', cursive;">Searched Buses</h2>
  <div class="row justify-content-center">
    <div class="col-lg-12 col-sm-12 bg-transparent p-2">

      <div class="card p-4 bg-transparent shadow-lg" style="border:white solid 1px;">
      
                <table class="table table-success table-hover table-striped text-center" >
                  <thead>
                    <tr>
                      <th>Bus Profile</th>
                      <th>From</th>
                      <th>To</th>
                      <th>How Long</th>
                      <th>Date</th>
                      <th>Start Time</th>
                      <th>AC - NON AC</th>
                      <th>SELECT</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                 <?php
                 if(isset($_POST['searchbus'])){
                        $from = $_POST['from'];
                        $to = $_POST['to'];
                        $dates = $_POST['dates'];


                        $ser = new searcontrol();
                        $serres = $ser->searchta($from, $to, $dates);
                    if ($serres) { 
                        while ($row1 = $serres->fetch_assoc()) { ?>
                 
                      <td>
                        <img src="/rese/buso/<?php echo $row1['bus_photo'] ?>" style="width: 100px; height: 80px; border-radius: 15px;" class=""> </td>

                      <td><?php echo $row1['route_from']; ?></td>
                      <td><?php echo $row1['route_to']; ?></td>
                      <td><?php echo $row1['how_long']; ?></td>
                      <td><?php echo $row1['tdate']; ?></td>
                      <td><?php echo $row1['start_time']; ?></td>
                      <td><?php echo $row1['ac']; ?></td>

                        <form action="seatsel.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="bus_id" value="<?php echo $row1['busid']; ?>">
                        <input type="hidden" name="ownid" value="<?php echo $row1['id']; ?>">
                        <input type="hidden" name="bus_number" value="<?php echo $row1['bus_number']; ?>">
                        <input type="hidden" name="bus_name" value="<?php echo $row1['bus_name']; ?>">
                        <input type="hidden" name="bus_model" value="<?php echo $row1['bus_model']; ?>">
                        <input type="hidden" name="ac" value="<?php echo $row1['ac']; ?>">
                        <input type="hidden" name="license" value="<?php echo $row1['license']; ?>">
                        <input type="hidden" name="insurance" value="<?php echo $row1['insurance']; ?>">
                        <input type="hidden" name="sleeper" value="<?php echo $row1['sleeper']; ?>">
                        <input type="hidden" name="route_from" value="<?php echo $row1['route_from']; ?>">
                        <input type="hidden" name="route_to" value="<?php echo $row1['route_to']; ?>">
                        <input type="hidden" name="start_time" value="<?php echo $row1['start_time']; ?>">
                        <input type="hidden" name="how_long" value="<?php echo $row1['how_long']; ?>">
                        <input type="hidden" name="bus_photo" value="<?php echo $row1['bus_photo']; ?>">
                        <input type="hidden" name="tdate" value="<?php echo $row1['tdate']; ?>">
                      
                      <td><button type="submit" name="searsubmit" class="btn btn-success">Select Bus</button></td>
                      </form>
                    </tr> 
                    <?php
                      }
                    }
                  }
                    ?>                   
                  </tbody>
                </table>
                </div>
    </div>
  </div>
</div>



<hr>




<div class="container-fluid mb-5">
  <div class="row justify-content-center">

    <div class="col-lg-2 col-sm-12 bg-transparent p-2 mx-5">
      <div class="card text-center shadow-lg bg-transparent">
        <img class="card-img-top" src="b1.jpg" alt="Card image" style="width:100%">
        <div class="card-body">
          <h4 class="card-title text-light">Bus Name</h4>
          <p class="card-text text-light">From-To</p>
          <a href="" class="btn btn-primary">BOOK</a>
        </div>
      </div>
    </div>


    <div class="col-lg-2 col-sm-12 bg-transparent p-2 mx-5">
      <div class="card text-center shadow-lg bg-transparent" >
        <img class="card-img-top" src="b2.jpg" alt="Card image" style="width:100%">
        <div class="card-body">
          <h4 class="card-title text-light">Bus Name</h4>
          <p class="card-text text-light">From-To</p>
          <a href="" class="btn btn-primary">BOOK</a>
        </div>
      </div>
    </div>


    <div class="col-lg-2 col-sm-12 bg-transparent p-2 mx-5">
      <div class="card text-center shadow-lg bg-transparent" >
        <img class="card-img-top" src="b3.jpg" alt="Card image" style="width:100%">
        <div class="card-body">
          <h4 class="card-title text-light">Bus Name</h4>
          <p class="card-text text-light">From-To</p>
          <a href="" class="btn btn-primary">BOOK</a>
        </div>
      </div>
    </div>


    <div class="col-lg-2 col-sm-12 bg-transparent p-2 mx-5">
      <div class="card text-center shadow-lg bg-transparent">
        <img class="card-img-top" src="b4.jpg" alt="Card image" style="width:100%">
        <div class="card-body">
          <h4 class="card-title text-light">Bus-Name</h4>
          <p class="card-text text-light">From-To</p>
          <a href="" class="btn btn-primary">BOOK</a>
        </div>
      </div>
    </div>

  </div>
</div>


<div class="container-fluid mb-5">
  <div class="row justify-content-center">

    <div class="col-lg-2 col-sm-12 bg-transparent p-2 mx-5">
      <div class="card text-center shadow-lg bg-transparent">
        <img class="card-img-top" src="b1.jpg" alt="Card image" style="width:100%">
        <div class="card-body">
          <h4 class="card-title text-light">Bus Name</h4>
          <p class="card-text text-light">From-To</p>
          <a href="" class="btn btn-primary">BOOK</a>
        </div>
      </div>
    </div>


    <div class="col-lg-2 col-sm-12 bg-transparent p-2 mx-5">
      <div class="card text-center shadow-lg bg-transparent" >
        <img class="card-img-top" src="b2.jpg" alt="Card image" style="width:100%">
        <div class="card-body">
          <h4 class="card-title text-light">Bus Name</h4>
          <p class="card-text text-light">From-To</p>
          <a href="" class="btn btn-primary">BOOK</a>
        </div>
      </div>
    </div>


    <div class="col-lg-2 col-sm-12 bg-transparent p-2 mx-5">
      <div class="card text-center shadow-lg bg-transparent" >
        <img class="card-img-top" src="b3.jpg" alt="Card image" style="width:100%">
        <div class="card-body">
          <h4 class="card-title text-light">Bus Name</h4>
          <p class="card-text text-light">From-To</p>
          <a href="" class="btn btn-primary">BOOK</a>
        </div>
      </div>
    </div>


    <div class="col-lg-2 col-sm-12 bg-transparent p-2 mx-5">
      <div class="card text-center shadow-lg bg-transparent">
        <img class="card-img-top" src="b4.jpg" alt="Card image" style="width:100%">
        <div class="card-body">
          <h4 class="card-title text-light">Bus-Name</h4>
          <p class="card-text text-light">From-To</p>
          <a href="" class="btn btn-primary">BOOK</a>
        </div>
      </div>
    </div>

  </div>
</div>



<hr>



<div class="container-fluid mb-5 ">
  <!-- slider 1 -->
      <div id="rk1" class="carousel slide img-thumbnail " data-bs-ride="carouse">

        <div class="carousel-indicators">
          <button type="button" data-bs-target="#rk1" data-bs-slide-to="0" class="active"></button>
          <button type="button" data-bs-target="#rk1" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#rk1" data-bs-slide-to="2"></button>
          <button type="button" data-bs-target="#rk1" data-bs-slide-to="3"></button>
          <button type="button" data-bs-target="#rk1" data-bs-slide-to="4"></button>
        </div>

        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="4000">
            <img src="bus1.jpg" alt="0" class="d-block rounded-4 " style="width:100%">
            <div class="carousel-caption">
              <!-- <h3></h3> -->
             <!-- <a href="ownerreg.php"><button class="btn btn-warning p-4" style="font-size: 20px;">REGISTER</button></a> -->
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="4000">
            <img src="bus2.jpg" alt="1" class="d-block rounded-4" style="width:100%">
            <div class="carousel-caption">
              <!-- <h3></h3> -->
              <!-- <a href="#"><button class="btn btn-success p-4" style="font-size: 20px;">Booking</button></a> -->
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="4000">
            <img src="bus3.jpg" alt="2" class="d-block rounded-4" style="width:100%">
            <div class="carousel-caption">
              <h3></h3>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="4000">
            <img src="bus4.jpg" alt="3" class="d-block rounded-4" style="width:100%">
            <div class="carousel-caption">
              <h3></h3>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="4000">
            <img src="bus5.jpg" alt="4" class="d-block rounded-4" style="width:100%">
            <div class="carousel-caption">
              <h3></h3>
            </div>
          </div>
          </div>
        </div>
        
      </div>
    <!-- slider 1 -->




<hr>

<div class="container-fluid mb-5">
  <h2 class="text-center text-warning mb-4">GLOBAL PRESENCE</h2>
  <div class="row justify-content-center">
    <div class="col-lg-1 mx-4 bg-transparent p-1">
      <img src="Colombia.svg" class="rounded-circle" style="width:100px;">
      <h6 class="text-light text-center">Colombia</h6>
    </div>
    <div class="col-lg-1 mx-4 bg-transparent p-1">
      <img src="India.svg" class="rounded-circle" style="width:100px;">
      <h6 class="text-light text-center">India</h6>
    </div>
    <div class="col-lg-1 mx-4 bg-transparent p-1">
      <img src="Indonesia.svg" class="rounded-circle" style="width:100px;">
      <h6 class="text-light text-center">Indonesia</h6>
    </div>
    <div class="col-lg-1 mx-4 bg-transparent p-1">
      <img src="Malaysia.svg" class="rounded-circle" style="width:100px;">
      <h6 class="text-light text-center">Malaysia</h6>
    </div>
    <div class="col-lg-1 mx-4 bg-transparent p-1">
      <img src="Peru.svg" class="rounded-circle" style="width:100px;">
      <h6 class="text-light text-center">Peru</h6>
    </div>
    <div class="col-lg-1 mx-4 bg-transparent p-1">
      <img src="Singapore.svg" class="rounded-circle" style="width:100px;">
      <h6 class="text-light text-center">Singapore</h6>
    </div>
  </div>
</div>

<hr>

<div class="container-fluid bg-secondary mb-5">
  <div class="row justify-content-center">
    <div class="col-lg-2 bg-transparent p-2 mx-1">
      <p>redBus is the world's largest online bus ticket booking service trusted by over 25 million happy customers globally. redBus offers bus ticket booking through its website, iOS and Android mobile apps for all major routes.</p>
    </div>
    <div class="col-lg-2 bg-transparent p-2 mx-4 ">
      <h4 class="text-center text-light">About</h4>
      <h6 >About us</h6>
      <h6>nvestor</h6>
      <h6>Contact us</h6>
      <h6>Mobile version</h6>
      <h6>redBus on mobile</h6>
      <h6>Sitemap</h6>
      <h6>Offers</h6>
      <h6>Careers</h6>
    </div>
    <div class="col-lg-2 bg-transparent p-2 mx-4">
      <h4 class="text-center text-light">Info</h4>
      <h6>Privacy policy</h6>
      <h6>FAQ</h6>
      <h6>Blog</h6>
      <h6>Bus operator registration</h6>
      <h6>Agent registration</h6>
      <h6>Insurance partner</h6>
      <h6>User agreement</h6>
    </div>
    <div class="col-lg-2 bg-transparent p-2 mx-4">
      <h4 class="text-center text-light">Global Sites</h4>
      <h6>India</h6>
      <h6>Singapore</h6>
      <h6>Malaysia</h6>
      <h6>Indonesia</h6>
      <h6>Peru</h6>
      <h6>Colombia</h6>
    </div>
    <div class="col-lg-2 bg-transparent  p-2 mx-1">
      <h4 class="text-center text-light">Our Partners</h4>
      <h6>Goibibo Bus</h6>
      <h6>Goibibo Hotels</h6>
      <h6>Makemytrip Bus</h6>
      <h6>Makemytrip Hotels</h6>
    </div>
  </div>
</div>


</body>
</html>