<?php
session_start();

class BusDetControl1 {
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

    public function selbook($ownidss) {
        $selectbook = "SELECT * FROM buses WHERE id ='$ownidss'";
        return mysqli_query($this->conn, $selectbook);
    }

    public function getbookig($getbook) {
        $gb = "SELECT * FROM booking WHERE bid ='$getbook'";
        return mysqli_query($this->conn, $gb);
    }
}

$selbookta = new BusDetControl1();
$ownidss = $_SESSION['ownerid'];
$selebook = $selbookta->selbook($ownidss);

if ($selebook) {
    while ($row3 = mysqli_fetch_assoc($selebook)) { 
        $_SESSION['busid'] = $row3['busid'];

    }
}

$getbook = $_SESSION['ownerid'];
$getb = $selbookta->getbookig($getbook);

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Book Chectk</title>
  <link rel="stylesheet" type="text/css" href="pro1.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
      body {
  background-image: url('img12.jpg');
  background-size: cover; 
  background-attachment: fixed; 
  background-repeat: no-repeat;
}
  </style>
</head>
<body class="mb-5">

  <nav class="navbar navbar-expand-sm bg-transparent shadow navbar-dark">
  <div class="container-fluid">
    <a href="ownerprofile.php" class="mx-auto"><img class="card-img-top rounded-circle" src="<?php echo  $_SESSION['ownerdp']  ?>" alt="Card image" style="width:100px; height: 100px;"></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item mx-5">
          <div class="mt-2">
          <h6 class="">
            <div class="d-flex">
            <h5 class="text-light me-2"><b>Welcome: </b></h5>
            <span class="text-warning" style="font-size: 20px;"><strong>
            <?php echo  $_SESSION['ownername']; ?></strong></span>
            </div>
          </h6>

            </div>
        </li>
        <li class="nav-item mx-5">
          <a class="nav-link btn btn-warning" href="../buso/busdeatailsdash.php"><span class="text-light" style="font-size: 20px;"><strong>HOME</strong></span> </a> 
        </li>
        <li class="nav-item mx-5">
          <a class="nav-link btn btn-danger" href="ownerlogout.php"><span class="text-light" style="font-size: 20px;"><strong>LOGOUT</strong></span></a>
        </li>    
      </ul>
    </div>
  </div>
</nav>



<div class="container-fluid mt-5">
  <div class="row justify-content-center">
    <div class="col-lg-12 col-sm-12 bg-transparent p-5">
      <div class="card shadow bg-transparent">
        <div class="card-body">
          

                <table class="table table-success table-hover table-striped text-center ">
                  <thead>
                    <tr>
                      <th>BOOING ID</th>
                      <th>customer profile</th>
                      <th>customer name</th>
                      <th>customer email</th>
                      <th>date</th>
                      <th>Booked seats</th>
                      <th>seat quantity</th>
                      <th>total amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                  <?php  if ($getb) {
                    while ($row4 = mysqli_fetch_assoc($getb)) {
                      ?>
                        <tr>
                          <td><?php echo $row4['bookingid'] ?></td>
                            <td><img src="/rese/customer/<?php echo $row4['cprofile']; ?>" style="width: 100px; height: 80px; border-radius: 15px;" class=""></td>

                            <td><?php echo $row4['cname'] ?></td>
                            <td><?php echo $row4['cemail'] ?></td>
                            <td><?php echo $row4['btdate'] ?></td>
                            <td><?php echo $row4['bookingseats'] ?></td>
                            <td><?php echo $row4['seatquantity'] ?></td>
                            <td><?php echo $row4['totaamount'] ?></td>
                            
                        </tr>
                    <?php
                    }
                } else {
                    echo "No records found.";
                }
                ?>
          
                  </tbody>
                </table>

        </div>
      </div>
    </div>
  </div>
</div>



</body>
</html>