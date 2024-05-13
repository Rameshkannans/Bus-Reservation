<?php
session_start();

include('../admin/db.php');
$db = new Database($servername, $username, $password, $dbname);

class buscontrol {
    public $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create() {
        $sql = "SELECT * FROM buses";
        $bselect = mysqli_query($this->conn, $sql);
        $_SESSION['buses'] = array(); 
        if ($bselect) {
            while ($row = $bselect->fetch_assoc()) {
                $_SESSION['buses'][] = $row; 
            }
        }
        return $bselect;
    }

    public function create1() {
        $sql1 = "SELECT * FROM owner";
        $select = mysqli_query($this->conn, $sql1);
        $_SESSION['owners'] = array(); 
        if ($select) {
            while ($row = $select->fetch_assoc()) {
                $_SESSION['owners'][] = $row; 
            }
        }
        return $select;
    }

    public function abd($abusdele) {
        $abusdelete = "DELETE FROM buses WHERE busid ='$abusdele'";
        $abde = $this->conn->query($abusdelete);
        if ($abde) {
          header('Location: abus.php');  
        }
    }

    public function aod($aowneridd) {
        $aowndelete = "DELETE FROM owner WHERE id ='$aowneridd'";
        $aode = $this->conn->query($aowndelete);
        if ($aode) {
          header('Location: abus.php');  
        }
    }

    public function obdel($aowneridd) {
        $obdele = "DELETE FROM buses WHERE id ='$aowneridd'";
        $ob = $this->conn->query($obdele);
        if ($ob) {
          header('Location: abus.php');  
        }
    }

    public function obbdele($aowneridd) {
        $deobb = "DELETE FROM booking WHERE bid ='$aowneridd'";
        $obbdd = $this->conn->query($deobb);
        if ($obbdd) {
          header('Location: abus.php');  
        }
    }

}

$busselect = new buscontrol($db->conn);
$bselect = $busselect->create();
$select = $busselect->create1();

if (isset($_POST['submit19'])) {
  $abusdele = $_POST['abusidd'];
  $busselect->abd($abusdele);
}

if (isset($_POST['submit22'])) {
  $aowneridd = $_POST['aowneridd'];
  $busselect->aod($aowneridd);
  $busselect->obdel($aowneridd); 
  $busselect->obbdele($aowneridd); 
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BUSES</title>
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
        <div class="bg-white p-4 mt-4 mb-4 backg " style="border-radius: 15px; height:2000px;">
          
          <div class="row">
            <div class="col-lg-12 col-sm-12 bg-transprent ">
              <h1 style="font-family: 'Grand Hotel'; color: white;">Buses and Owners</h1>
            </div>


       
            <div class="col-lg-12 col-sm-12 bg-transprent ">
              <div class="container mt-3">
                <h2 class="text-dark" style="font-family: 'Grand Hotel';">All Buses Deatails</h2>            
                <table class="table table-secondary table-hover table-striped text-center">
                      <thead>
                        <tr>
                          <th class="text-primary">BusNo</th>
                          <th class="text-primary">BusName</th>
                          <th class="text-primary">BusModel</th>
                          <th class="text-primary">AC</th>
                          <th class="text-primary">Licence</th>
                          <th class="text-primary">Insurance</th>
                          <th class="text-primary">Sleeper</th>
                          <th class="text-primary">Photo</th>
                          <th class="text-primary">Edit</th>
                          <th class="text-primary">Remove</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        if (!empty($_SESSION['buses'])) {
                          foreach ($_SESSION['buses'] as $bus) {
                            echo "<tr>";
                            echo "<td>" . $bus['bus_number'] . "</td>";
                            echo "<td>" . $bus['bus_name'] . "</td>";
                            echo "<td>" . $bus['bus_model'] . "</td>";
                            echo "<td>" . $bus['ac'] . "</td>";
                            echo "<td>" . $bus['license'] . "</td>";
                            echo "<td>" . $bus['insurance'] . "</td>";
                            echo "<td>" . $bus['sleeper'] . "</td>";?>
                            <td><img src="/rese/buso/<?php echo $bus['bus_photo']; ?> " style="width: 100px; height: 80px; border-radius: 15px;"> </td>
                          
                            <td>
                              <form action="aubus.php" method="post">
                                <input type="hidden" name="abusid" value="<?php echo $bus['busid']; ?>">
                                <button type="submit" name="submit18" class="btn btn-success">Edit</button>
                              </form>
                            </td>



                            <form method="post" action="">
                           <input type="hidden" name="abusidd" value="<?php echo $bus['busid']; ?>">
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
                                              <h5 class="text-danger">Do you want to remove the bus?....</h5>
                                              <button type="submit" name="submit19" class="btn btn-danger">REMOVE</button>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </form>




                            <?php
                            echo "</tr>";
                          }
                        } else {
                          echo "<tr><td colspan='10'>No bus records found.</td></tr>";
                        }
                        ?>
                      </tbody>
                    </table>

              </div>
            </div>


        <div class="col-lg-12 col-sm-12 bg-transprent mt-4 ">
              <div class="container mt-3">
                <h2 class="text-dark" style="font-family: 'Grand Hotel';">All Bus Owners Deatails</h2>            
                <table class="table table-secondary table-hover table-striped text-center">
                  <thead>
                    <tr>
                      <th class="text-primary">Name</th>
                      <th class="text-primary">Email</th>
                      <th class="text-primary">Phone</th>
                      <th class="text-primary">Address</th>
                      <th class="text-primary">CName</th>
                      <th class="text-primary">Profile</th>
                      <th class="text-primary">Edit</th>
                      <th class="text-primary">Remove</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      if (!empty($_SESSION['owners'])) {
                          foreach ($_SESSION['owners'] as $owner) {
                              echo "<tr>";
                              echo "<td>" . $owner['name'] . "</td>";
                              echo "<td>" . $owner['email'] . "</td>";
                              echo "<td>" . $owner['phone_number'] . "</td>";
                              echo "<td>" . $owner['address'] . "</td>";
                              echo "<td>" . $owner['company_name'] . "</td>";?>

                              <td><img src="/rese/buso/<?php echo $owner['profile_photo']; ?> " style="width: 100px; height: 80px; border-radius: 15px;"> </td>
                              

                              <form action="auowner.php" method="post">
                                <input type="hidden" name="aownidd" value="<?php echo $owner['id']; ?> ">
                              <td><a href="auowner.php"><button type="submit" name="submit23" class="btn btn-success">Edit</button></a></td>
                              </form>



                       <form method="post" action="">
                          <input type="hidden" name="aowneridd" value="<?php echo $owner['id']; ?>">
                          <div class="text-center">
                              <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal1">
                                  REMOVE
                              </button></td>
                              <div class="modal fade" id="myModal1">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h4 class="modal-title text-primary">@admin <?php echo  $_SESSION['adminname'] ?>......</h4>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                          </div>
                                          <div class="modal-body text-center">
                                              <h5 class="text-danger">Do you want to remove the owner, the same time the owner buses are removed....</h5>
                                              <button type="submit" name="submit22" class="btn btn-danger">REMOVE</button>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </form>




                            <?php  echo "</tr>";
                          }
                      } else {
                          echo "<tr><td colspan='8'>No bus records found.</td></tr>";
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
      <!-- CONTAINER 2 -->
    </div>






</body>
</html>