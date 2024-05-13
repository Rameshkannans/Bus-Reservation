<?php session_start(); ?>


<?php
class busdetcontrol {
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

    public function ownerdel($id) {
        $owdel = "DELETE FROM owner WHERE id='$id'";
        $od = $this->conn->query($owdel);
        if ($od) {
          header('Location:ownerlogout.php');  
        }
    }

    public function busessdel($id11) {
        $budel = "DELETE FROM buses WHERE id='$id11'";
        $bds = $this->conn->query($budel);
        if ($bds) {
          header('Location:ownerlogout.php');  
        }
    }

    public function alldele($id11) {
        $all = "DELETE FROM booking WHERE bid='$id11'";
        $alld = $this->conn->query($all);
        if ($alld) {
          header('Location:ownerlogout.php');  
        }
    }

}



if (isset($_POST['submit13'])) {
  $id11 = $_POST['iid'];
  $owndel = new busdetcontrol();
  $odelres = $owndel->ownerdel($id11);

  $bdelres = $owndel->busessdel($id11);

   $bdelres = $owndel->alldele($id11);

}

?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Owner Profile</title>
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
    <!-- <a class="navbar-brand" href="#">Logo</a> -->
    <a href="busdeatailsdash.php" class="mx-auto"><img class="card-img-top rounded-circle" src="<?php echo  $_SESSION['oph']  ?>" alt="Card image" style="width:100px; height: 100px;"></a> 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item mx-5">
          <div class="mt-2">
          <a class="" style="text-decoration: none;"><span class="text-warning" style="font-size: 20px;"><b class="text-light">NAME:</b> <strong>
            <?php echo  $_SESSION['on']; ?></strong></span></a>
            </div></strong></span></a>
        </li>
        <li class="nav-item mx-5">
          <a class="nav-link btn btn-warning" href="busdeatailsdash.php"><span class="text-light" style="font-size: 20px;"><strong>HOME</strong></span> </a>
        </li>
        <li class="nav-item mx-5">
          <a class="nav-link btn btn-danger" href="ownerlogout.php"><span class="text-light" style="font-size: 20px;"><strong>LOGOUT</strong></span></a>
        </li>    
      </ul>
    </div>
  </div>
</nav>


<div class="container-fluid">
  <div class="row justify-content-center mt-5">
    <div class="col-6 bg-transprent  p-5">
        
          <div class="card  shadow-lg bg-transparent">
            <img class="card-img-top rounded-circle mx-auto" src="<?php echo  $_SESSION['oph']  ?>" alt="Card image" style="width:400px; height: 400px;">
            <div class="card-body">
              <h4 class="card-title  text-center text-info"><?php echo  $_SESSION['ownername']; ?></h4>
              <div class="d-flex my-2">
              <h4 class="text-light">NAME: </h4>
              <h5 class="ms-auto " style="color: #d0f043"><?php echo  $_SESSION['on']; ?></h5>
              </div>

              <div class="d-flex my-2">
              <h4 class="text-light">Email ID: </h4>
              <h5 class="ms-auto" style="color: #d0f043"><?php echo  $_SESSION['oe']; ?></h5>
              </div>

              <div class="d-flex my-2">
              <h4 class="text-light">Phone Number: </h4>
              <h5 class="ms-auto " style="color: #d0f043"><?php echo $_SESSION['opn']; ?></h5>
              </div>

              <div class="d-flex my-2">
              <h4 class="text-light">Adress: </h4>
              <h5 class="ms-auto " style="color: #d0f043"><?php echo $_SESSION['oa']; ?></h5>
              </div>

              <div class="d-flex my-2">
              <h4 class="text-light">Company Name (or) Bus Name: </h4>
              <h5 class="ms-auto " style="color: #d0f043"><?php echo  $_SESSION['ocn']; ?></h5>
              </div>

              <form method="post" action="">
                  <input type="hidden"  name="iid" value="<?php echo $_SESSION['iid']; ?>">
              <div class="text-center">

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal">
                          DELETE PROFILE
                            </button>
                          <div class="modal fade" id="myModal">
                            <div class="modal-dialog">
                              <div class="modal-content">

                                <div class="modal-header">
                                  <h4 class="modal-title text-primary"><?php echo  $_SESSION['ownername']; ?>......</h4>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body text-center">
                                  <h5 class="text-danger">You want Remove your account same time your bus and you recived the bus tickets also removed....</h5>
                                  <button class="btn btn-outline-warning" type="submit" name="submit13">DELETE PROFILE</button>
                                </div>

                                <div class="modal-footer">
                                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
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





</body>
</html>