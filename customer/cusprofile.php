<?php
session_start();

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

    public function cusdel($id1111){
        $cwdel = "DELETE FROM customers WHERE id='$id1111'";
        $cd = $this->conn->query($cwdel);
        if ($cd) {
            return true;
        } else {
            return false;
        }
    }

    public function bookdel($id1111){
        $bwdel = "DELETE FROM booking WHERE cusid='$id1111'";
        $bcd = $this->conn->query($bwdel);
        if ($bcd) {
            return true;
        } else {
            return false;
        }
    }
}

if (isset($_POST['submit70'])) {
    $id1111 = $_POST['iid'];
    $cusdel = new busdetcontrol();
    
   
    if ($cusdel->cusdel($id1111)) {
        
        $cusdel->bookdel($id1111);
        
        header('Location: customerlogout.php');
        exit;
    } else {
        echo "Error deleting the profile.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Customer Profile</title>
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
                      
                    </li> 
                    </ul>
                    <ul class="navbar-nav">
                     <!--  <li class="nav-item">
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



<div class="container" style="margin-top: 100px;">
  <div class="row justify-content-center">
    <div class="col-lg-8 col-sm-12 bg-transparent shadow-lg p-4">
      <div class="card shadow bg-transparent">
        <img src="<?php echo  $_SESSION['cusdp'];  ?>" class="rounded-circle mx-auto" style="width: 200px; height: 200px;">
        <div class="card-body p-5">
          <div class="d-flex mt-2">
            <h4 class="text-light">Name: </h4>
            <h5 class="mt-1 ms-5 ms-auto text-warning"><?php echo  $_SESSION['cusname']  ?></h5>
          </div>
          
          <div class="d-flex mt-2">
            <h4 class="text-light">Email: </h4>
            <h5 class="mt-1 ms-5 ms-auto text-warning"><?php echo  $_SESSION['cusemail']  ?></h5>
          </div>
          <div class="d-flex mt-2">
            <h4 class="text-light">Phone: </h4>
            <h5 class="mt-1 ms-5 ms-auto text-warning"><?php echo  $_SESSION['cusphone']  ?></h5>
          </div>
          <div class="d-flex mt-2">
            <h4 class="text-light">Address: </h4>
            <h5 class="mt-1 ms-5 ms-auto text-warning"><?php echo  $_SESSION['cusaddress']  ?></h5>
          </div>
          <div class="d-flex mt-2">
            <h4 class="text-light">City: </h4>
            <h5 class="mt-1 ms-5 ms-auto text-warning"><?php echo  $_SESSION['cuscity']  ?></h5>
          </div>
          <div class="d-flex mt-2">
            <h4 class="text-light">State: </h4>
            <h5 class="mt-1 ms-5 ms-auto text-warning"><?php echo  $_SESSION['cusstate']  ?></h5>
          </div>
          <div class="d-flex mt-2">
            <h4 class="text-light">Pincode: </h4>
            <h5 class="mt-1 ms-5 ms-auto text-warning"><?php echo  $_SESSION['cuspin']  ?></h5>
          </div>
          <div class="d-flex mt-2">
            <h4 class="text-light">Date Of Birth: </h4>
            <h5 class="mt-1 ms-5 ms-auto text-warning"><?php echo  $_SESSION['cusdob']  ?></h5>
          </div>
          <hr>

        <form action="updatecustomer.php" method="post" >
            <input type="hidden" name="ccid" value="<?php echo  $_SESSION['cusid'] ?>">
            <input type="hidden" name="ccdp" value="<?php echo $_SESSION['cusdp'] ?>">
            <input type="hidden" name="ccna" value="<?php echo $_SESSION['cusname'] ?>">
            <input type="hidden" name="ccem" value="<?php echo  $_SESSION['cusemail'] ?>">
            <input type="hidden" name="ccph" value="<?php echo $_SESSION['cusphone'] ?>">
            <input type="hidden" name="ccadd" value="<?php echo $_SESSION['cusaddress'] ?>">
            <input type="hidden" name="cccc" value="<?php echo $_SESSION['cuscity'] ?>">
            <input type="hidden" name="ccst" value="<?php echo $_SESSION['cusstate'] ?>">
            <input type="hidden" name="ccpi" value="<?php echo $_SESSION['cuspin'] ?>">
            <input type="hidden" name="ccdob" value="<?php echo $_SESSION['cusdob'] ?>">
          <div class="text-center mb-5">
            <a href="updatecustomer.php"><button type="submit" name="submit15" class="btn btn-success">UPDATE PROFILE</button></a> 
          </div>
        </form>


        
         <form method="post" action="">
          <input type="hidden" name="iid" value="<?php echo $_SESSION['cusid']; ?>">
          <div class="text-center">
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal">
                  DELETE PROFILE
              </button>
              <div class="modal fade" id="myModal">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title text-primary"><?php echo $_SESSION['cusname']; ?>......</h4>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                          </div>
                          <div class="modal-body text-center">
                              <h5 class="text-danger">Do you want to remove your account?..</h5>
                              <button class="btn btn-outline-warning" type="submit" name="submit70">DELETE PROFILE</button>
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




</body>
</html>