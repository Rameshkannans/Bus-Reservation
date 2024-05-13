<?php 
  session_start();
  if(!isset($_SESSION['ownername'])){
  // header('location:ownerlogin.php');
}
?>
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

    public function dets($id) {
        $det = "SELECT * FROM buses WHERE id = '$id'";
        $detres = $this->conn->query($det);
        return $detres; 
    }

     public function busdel($bdel) {
        $bdele = "DELETE FROM buses WHERE busid ='$bdel'";
        $bdelete = $this->conn->query($bdele);
        if ($bdelete) {
           header('Location:busdeatails.php');
         } 
    }


}

$id = $_SESSION['ownerid'];
$detress = new busdetcontrol();
$detre = $detress->dets($id);



if (isset($_POST['submit14'])) {
  $bdel = $_POST['bdel'];
  $detress->busdel($bdel);
}



?>






<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bus Deatails</title>
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
                      <th>BUS NUMER</th>
                      <th>BUS Name</th>
                      <th>BUS MODAL</th>
                      <th>AC</th>
                      <th>LiCENCE</th>
                      <th>INSU</th>
                      <th>SLEEPER</th>
                      <th>FROM</th>
                      <th>TO</th>
                      <th>STRAT TIME</th>
                      <th>HOW LONG(hr)</th>
                      <th>DATE</th>
                      <th>BUS DP</th>
                      <th>EDIT</th>
                      <th>DELETE</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                  <?php if ($detre) { 
                      while ($row2 = $detre->fetch_assoc()) {
                        $_SESSION['bbid'] = $row2['busid'];
                       ?>
                      <td><?php echo $row2['bus_number'] ?> </td>
                      <td><?php echo $row2['bus_name'] ?> </td>
                      <td><?php echo $row2['bus_model'] ?> </td>
                      <td><?php echo $row2['ac'] ?> </td>
                      <td><?php echo $row2['license'] ?> </td>
                      <td><?php echo $row2['insurance'] ?> </td>
                      <td><?php echo $row2['sleeper'] ?> </td>
                      <td><?php echo $row2['route_from'] ?> </td>
                      <td><?php echo $row2['route_to'] ?> </td>
                      <td><?php echo $row2['start_time'] ?> </td>
                      <td><?php echo $row2['how_long'] ?> </td>
                      <td><?php echo $row2['tdate'] ?> </td>
                      <td><img src="<?php echo $row2['bus_photo'] ?>" style="width: 100px; height: 80px; border-radius: 15px;" class=""> </td>
                      <form action="updatebus.php" method="post">
                        <input type="hidden" name="biid" value="<?php echo $row2['busid'] ?>">
                        <input type="hidden" name="bnum" value="<?php echo $row2['bus_number'] ?>">
                        <input type="hidden" name="bnam" value="<?php echo $row2['bus_name'] ?>">
                        <input type="hidden" name="bmod" value="<?php echo $row2['bus_model'] ?>">
                        <input type="hidden" name="baac" value="<?php echo $row2['ac'] ?>">
                        <input type="hidden" name="blic" value="<?php echo $row2['license'] ?>">
                        <input type="hidden" name="bins" value="<?php echo $row2['insurance'] ?>">
                        <input type="hidden" name="bslee" value="<?php echo $row2['sleeper'] ?>">
                        <input type="hidden" name="brf" value="<?php echo $row2['route_from'] ?>">
                        <input type="hidden" name="brt" value="<?php echo $row2['route_to'] ?>">
                        <input type="hidden" name="bstime" value="<?php echo $row2['start_time'] ?>">
                        <input type="hidden" name="bhl" value="<?php echo $row2['how_long'] ?>">
                        <input type="hidden" name="bpp" value="<?php echo $row2['bus_photo'] ?>">
                        <input type="hidden" name="bdate" value="<?php echo $row2['tdate'] ?>">
                        <td><a href="updatebus.php"><button name="submit11" class="btn btn-success">EDIT</button></a> </td>
                      </form>


                      <form action="" method="post">
                        <input type="hidden" name="bdel" value="<?php echo $row2['busid'] ?>">
                       <td> <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal">
                          DELETE
                            </button></td>

                          
                          <div class="modal fade" id="myModal">
                            <div class="modal-dialog">
                              <div class="modal-content">

                                <div class="modal-header">
                                  <h4 class="modal-title"><?php echo  $_SESSION['ownername']; ?>......</h4>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body text-center">
                                  <h5 class="text-danger">You want Remove this bus?..</h5>
                                  <button name="submit14" class="btn btn-warning"><b>CONFORM DELETE</b> </button>
                                </div>

                                
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>

                              </div>
                            </div>

                      </form>
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

<!-- <div class="text-center">
  <a href="updatebus.php"><button class="btn btn-warning"><b class="text-light">UPDATE DEATAILS</b> </button> </a>
</div> -->

</body>
</html>