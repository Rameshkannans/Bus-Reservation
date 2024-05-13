<?php
session_start();

class seeticket {
    public $conn;
    public $fetch = null; 

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

    public function selecttick($cusidss) {
        $sql5 = "SELECT * FROM booking WHERE cusid = '$cusidss'";
        $ftic = mysqli_query($this->conn, $sql5);
        return $ftic;
    }

    public function delboo($bookids) {
        $bodel = "DELETE FROM booking WHERE bookingid ='$bookids'";
        $bod = $this->conn->query($bodel);
        if ($bod) {
          header('Location:custicket.php');  
        }
    }
}

$cusidss = $_SESSION['cusid']; 

$distic = new seeticket(); 
$result = $distic->selecttick($cusidss);

if (isset($_POST['submit17'])) {
  $bookids = $_POST['bookids'];
  $distic->delboo($bookids); 
}

?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ticket</title>
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
          
  </style>
</head>
<body>

  <!-- NAvigation Bar end -->
    <nav class="navbar navbar-expand-sm bg-white shadow navbar-dark px-1" style="position: fixed; top: 0; width: 100%; z-index: 1000; opacity: 0.8;">
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
                      
                    </li> 
                    </ul>
                    <ul class="navbar-nav">
                      <!-- <li class="nav-item">
                        <a class="nav-link text-dark text-center px-4" style="font-size: 17px;" id="b1" href="#"><i class="fa fa-headphones me-2" aria-hidden="true"></i>Help</a>
                      </li> --> 
                    </ul>
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link text-dark text-center px-4" style="font-size: 17px;" id="b1" href="cusbooking.php">Home</a>
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
            <a class="navbar-brand" href="cusprofile.php"><img class="card-img-top rounded-circle" src="<?php echo  $_SESSION['cusdp']  ?>" alt="Card image" style="width:100px; height: 100px;">  </a>
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
          
              <div class="table-responsive">
                <table class="table table-success table-hover table-striped text-center ">
                  <thead>
                    <tr>
                      <td><b>costomer profile</b></td>
                      <td><b>booking id</b></td>
                      <td><b>costomer email</b></td>
                      <td><b>costomer name</b></td>
                      <td><b>bus id</b></td>
                      <td><b>bus name</b></td>
                      <td><b>ac/non-ac</b></td>
                      <td><b>seat/seep</b></td>
                      <td><b>from</b></td>
                      <td><b>to</b></td>
                      <td><b>start time</b></td>
                      <td><b>bus number</b></td>
                      <td><b>booking date</b></td>
                      <td><b>owner name</b></td>
                      <td><b>owner email</b></td>
                      <td><b>owner phone</b></td>
                      <td><b>booked seats</b></td>
                      <td><b>seat quantity</b></td>
                      <td><b>total amount</b></td>
                      <td><b>cancel ticket</b></td>
                     <th></th>
                     <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                   <?php if ($result) {
                      while($rows = mysqli_fetch_assoc($result)) { 
                          $_SESSION['bookingids'] = $rows['bookingid'];
                        ?>
                  <td><img src="<?php echo $rows['cprofile']; ?>" style="width: 100px; height: 100px; border-radius: 15px;"> </td>
                      <td><?php echo $rows['bookingid']; ?></td>
                      <td><?php echo $rows['cemail']; ?></td>
                      <td><?php echo $rows['cname']; ?></td>
                      <td><?php echo $rows['bid']; ?></td>
                      <td><?php echo $rows['busname']; ?></td>
                      <td><?php echo $rows['bac']; ?></td>
                      <td><?php echo $rows['bsleeper']; ?></td>
                      <td><?php echo $rows['broute_from']; ?></td>
                      <td><?php echo $rows['broute_to']; ?></td>
                      <td><?php echo $rows['bstart_time']; ?></td>
                      <td><?php echo $rows['busnumber']; ?></td>
                      <td><?php echo $rows['btdate']; ?></td>
                      <td><?php echo $rows['oname']; ?></td>
                      <td><?php echo $rows['oemail']; ?></td>
                      <td><?php echo $rows['onumber']; ?></td>
                      <td><?php echo $rows['bookingseats']; ?></td>
                      <td><?php echo $rows['seatquantity']; ?></td>
                      <td><?php echo $rows['totaamount']; ?></td>



                    


                       <form method="post" action="">
                          <input type="hidden"name="bookids" value="<?php echo $_SESSION['bookingids']; ?>">
                          <div class="text-center">
                              <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal">
                                  CANCEL TICKET
                              </button></td>
                              <div class="modal fade" id="myModal">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h4 class="modal-title text-primary"><?php echo $_SESSION['cusname']; ?>......</h4>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                          </div>
                                          <div class="modal-body text-center">
                                              <h5 class="text-danger">Do you want to cancel the ticket?..</h5>
                                              <button type="submit" name="submit17" class="btn btn-success"> Cancel Ticket</button>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </form>


                      <td><button class="btn btn-outline-primary">PDF</button></td>
                      <td><button class="btn btn-outline-info">PRINT</button></td>


                    </tr>
                    <?php 
                  } 
                }
                     ?>                    
                  </tbody>
                </table>

            </div>

        </div>
      </div>
    </div>
  </div>
</div>




</body>
</html>